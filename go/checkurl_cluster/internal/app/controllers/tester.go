package controllers

import (
	"encoding/json"
	"fmt"
	"github.com/go-co-op/gocron"
	"net/http"
	"net/url"
	"os"
	"strconv"
	"sync"
	"time"
)

type Response struct {
	StatusCode string
	Time       time.Time
}

type Params struct {
	frequency string
	check_id  int
	remove_id int
}

func TesterPrice(s *gocron.Scheduler) http.HandlerFunc {
	return func(w http.ResponseWriter, r *http.Request) {
		params, _ := url.ParseQuery(r.URL.RawQuery)
		tag := params.Get("remove_id")
		fmt.Printf("TAGS", tag)
		if len(tag) > 0 {
			//jobs, err := s.FindJobsByTag(tag)
			jobs := s.Jobs()

			s.Clear()
			fmt.Printf("JOBS", jobs)
			fmt.Printf("REMOVED", jobs)
			return
		}

		var wg sync.WaitGroup

		wg.Add(1)

		go func() {
			defer wg.Done()

			w.Header().Set("Content-Type", "application/json")

			intNum, _ := strconv.Atoi(params.Get("frequency"))

			jobs := s.Jobs()

			fmt.Printf("LIST OF JOBS", jobs)

			job, _ := s.Every(intNum).Minute().Tag("foo").Do(taskWithParams, params)
			fmt.Printf("TAGGED", job)

			s.StartAsync()

		}()
		wg.Wait()
		json.NewEncoder(w).Encode(map[string]interface{}{
			"result": "ok",
		})
	}

}

func TesterCron(w http.ResponseWriter, r *http.Request) {
	params, _ := url.ParseQuery(r.URL.RawQuery)
	tag := params.Get("tags")
	fmt.Printf("TAGS", tag)
	s := gocron.NewScheduler(time.UTC)
	if len(tag) > 0 {
		jobs, err := s.FindJobsByTag(tag)
		s.RemoveByTag("foo")
		if err != nil {
			fmt.Errorf("%s: %s", err.Error(), tag)
		}
		fmt.Printf("JOBS", jobs)
		return
	}

	var wg sync.WaitGroup

	wg.Add(1)

	go func() {
		defer wg.Done()

		w.Header().Set("Content-Type", "application/json")

		url := params.Get("url")
		//check_id := params.Get("check_id")
		repeat, _ := strconv.Atoi(params.Get("repeat_count"))

		intNum, _ := strconv.Atoi(params.Get("frequency"))
		var resp_arr Response

		s.TagsUnique()
		resp, err := http.Get(url)
		if err != nil {
			fmt.Printf("ERR", err)
			go ErrorHandlerTimeout(params, repeat, url)
			return
		}

		fmt.Printf("RESP", resp)

		code := resp.StatusCode
		fmt.Printf("CODE", code)
		resp_arr.StatusCode = strconv.Itoa(code)
		resp_arr.Time = time.Now()
		defer resp.Body.Close()
		if err != nil {
			fmt.Println("err", err.Error())
		}
		jobs := s.Jobs()

		fmt.Printf("LIST OF JOBS", jobs)

		job, _ := s.Every(intNum).Minute().Tag("foo").Do(taskWithParams, params, resp_arr, 0)
		fmt.Printf("TAGGED", job)

		s.StartAsync()
		if code != 200 && repeat != 0 {
			go ErrorHandler(params, repeat, url)

		}
	}()
	wg.Wait()
	json.NewEncoder(w).Encode(map[string]interface{}{
		"result": "ok",
	})

}
func taskWithParams(params url.Values) {
	url := os.Getenv("DOMAIN_URL") + "/create-user/price"
	resp, err := http.Get(url)
	if err != nil {
		fmt.Printf("ERR", err)
		fmt.Printf("ERROR", err.Error())
		return
	}

	fmt.Printf("OK", resp.StatusCode)

	fmt.Print("UPDATED")

	/*check_id := params.Get("check_id")

	url_id := params.Get("url_id")
	http_code := resp_arr.StatusCode

	config :=
		database.Config{
			ServerName: os.Getenv("DB_HOST") + ":3306",
			User:       os.Getenv("DB_USERNAME"),
			Password:   os.Getenv("DB_PASSWORD"),
			DB:         os.Getenv("DB_DATABASE"),
		}

	connectionString := database.GetConnectionString(config)
	err := database.Connect(connectionString)
	if err != nil {
		panic(err.Error())
	}
	fmt.Printf("CONN", connectionString)
	var sql string
	sqlDB, err := database.Connector.DB()
	fmt.Printf("DB CONN OPENED", sqlDB)
	if repeat != 0 {
		fmt.Printf("NO o", repeat)
		sql = "INSERT INTO checklog SET  " +
			"check_id = ?," +
			"http_code = ?," +
			"url_id = ?," +
			"errors_count = ?"
		str := strconv.Itoa(repeat)
		res, err := sqlDB.Exec(sql,
			check_id,
			http_code,
			url_id, str)
		if err != nil {
			fmt.Printf("err", err)
		}
		fmt.Printf("RSS", res)
	} else {
		fmt.Printf("YES o", repeat)
		sql = "INSERT INTO checklog SET  " +
			"check_id = ?," +
			"http_code = ?," +
			"url_id = ?"
		sqlDB.Exec(sql,
			check_id,
			http_code,
			url_id)
	}
	defer sqlDB.Close()
	fmt.Printf("SQL CLOSED", sqlDB)

	if err != nil {
		panic(err)
	}

	fmt.Print("Gocron is finished") */

}

func ErrorHandler(params url.Values, repeat int, url string) {
	var res_arr Response
	for i := 1; i <= repeat; i++ {
		fmt.Printf("error_reapiting", i)
		time.Sleep(1 * time.Minute)
		res_arr.Time = time.Now()
		res, errors := http.Get(url)
		if errors != nil {
			fmt.Printf("errors", errors)
			ErrorHandlerTimeout(params, repeat, url)
			return
		}

		http := res.StatusCode
		res_arr.StatusCode = strconv.Itoa(http)
		taskWithParams(params)
	}
}
func ErrorHandlerTimeout(params url.Values, repeat int, url string) {

	for i := 1; i <= repeat; i++ {
		fmt.Printf("error_reapiting", i)
		go asyncCall(params, i, url)
		time.Sleep(1 * time.Minute)
	}
}

func asyncCall(params url.Values, repeat int, url string) {
	var res_arr Response
	res_arr.Time = time.Now()
	req, err := http.NewRequest("GET", url, nil)
	if err != nil {
		fmt.Printf("errors", err)
		res_arr.StatusCode = "0"
		taskWithParams(params)
		return
	}
	res, err := new(http.Transport).RoundTrip(req)
	if err != nil {
		fmt.Printf("errors", err)
		res_arr.StatusCode = "0"
		taskWithParams(params)
		return
	}
	defer res.Body.Close()
	fmt.Printf("RES", res)
	http := res.StatusCode
	res_arr.StatusCode = strconv.Itoa(http)
	res_arr.Time = time.Now()
	taskWithParams(params)

}

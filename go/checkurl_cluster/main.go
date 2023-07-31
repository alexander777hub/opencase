package main

import (
	"fmt"
	"github.com/joho/godotenv"
	"gitlab.com/Pereselkov777/checkurl_cluster/internal/app/database"
	"log"
)

// init is invoked before main()
func init() {
	// loads values from .env into the system
	if err := godotenv.Load(".env"); err != nil {
		log.Print("No .env file found")
	}
}

func main() {
	// test commit test2
	fmt.Println("Hello, world!")

	config :=
		database.Config{
			ServerName: "localhost:3306",
			User:       "root",
			Password:   "root",
			DB:         "trader_cluster1",
		}

	connectionString := database.GetConnectionString(config)
	err := database.Connect(connectionString)
	if err != nil {
		panic(err.Error())
	}

}

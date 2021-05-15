<!-- ABOUT THE PROJECT -->
## About The Project

Simple forum application to create threads, posts and allow the signed in users to vote on the posts. This application should not be used in production as is.

### Built With

+ Laravel
+ Vue 2
+ TailwindCSS

<!-- GETTING STARTED -->
## Getting Started

Docker should be installed localy. For testing a separate DB service is pre configured.

### Prerequisites

Run the following command to spin up docker.
   ```
docker-compose up -d
   ```

Copy .env.example to .env and configure with your DB credentials.

To run the test, enter into the docker via this command.

   ```
docker exec -it forum_app bash
   ```

To lunch the tests execute this command

   ```
./testrunner.sh
   ```
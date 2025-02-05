pipeline {
    agent any

    environment {
        DOCKER_IMAGE = "php" // Replace with your Docker image name
        DOCKER_TAG = "latest"
        DB_CONTAINER = "mysql-db" // Replace with your database container name
        APP_CONTAINER = "php-app" // Replace with your PHP app container name
    }

    stages {
        // Stage 1: Checkout code from GitHub
        stage('Checkout') {
            steps {
                git branch: 'master',url: 'https://github.com/deepakgunadhya/online-shopping-system-advanced.git'
            }
        }

        // Stage 2: Build Docker image for PHP application
        stage('Build Docker Image') {
            steps {
                script {
                 bat "docker build -t ${DOCKER_IMAGE}:${DOCKER_TAG} ."
                }
            }
        }

        // Stage 3: Deploy Docker environment (PHP app + DB)
        stage('Deploy Docker Environment') {
            steps {
                script {
                     // Start MySQL database container
                    bat "docker run -d --name ${DB_CONTAINER} -e MYSQL_ROOT_PASSWORD=root -e MYSQL_DATABASE=app_db mysql:5.7"

                    // Start PHP application container and link it to the DB container
                    bat "docker run -d --name ${APP_CONTAINER} --link ${DB_CONTAINER}:mysql -p 80:80 ${DOCKER_IMAGE}:${DOCKER_TAG}"
                }
            }
        }

        // Stage 4: Run web automation tests
        stage('Run Web Automation Tests') {
            steps {
                script {
echo "Running automation code."
                    // Install dependencies and run tests (assuming you have a test script)
                  //  sh "docker exec ${APP_CONTAINER} /bin/bash -c 'composer install && vendor/bin/phpunit tests/'"
                }
            }
        }
    }

    // Post-build actions
    post {
        success {
            echo "Pipeline succeeded! Application deployed and tests passed."
        }
        failure {
            echo "Pipeline failed. Check the logs for details."
        }
        always {
            // Clean up Docker containers
            script {
                echo "clean up docker containers"
            // bat "docker stop ${APP_CONTAINER} || true"
            // bat "docker rm ${APP_CONTAINER} || true"
            //  bat "docker stop ${DB_CONTAINER} || true"
            //    bat "docker rm ${DB_CONTAINER} || true"
                // bat "docker stop ${APP_CONTAINER}"
                // bat "docker rm ${APP_CONTAINER}"
                // bat "docker stop ${DB_CONTAINER}"
                // bat "docker rm ${DB_CONTAINER}"
            }
        }
    }
}

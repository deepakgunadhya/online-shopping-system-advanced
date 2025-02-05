pipeline {
    agent any

    environment {
        MYSQL_ROOT_PASSWORD = 'root'
        MYSQL_DATABASE = 'mydb'
        MYSQL_USER = 'user'
        MYSQL_PASSWORD = 'password'
    }

    stages {
        stage('Clone Repository') {
            steps {
                git branch: 'master', url: 'https://github.com/deepakgunadhya/online-shopping-system-advanced.git'
            }
        }

        stage('Build Docker Containers') {
            steps {
                script {
                    bat 'docker-compose up -d'
                }
            }
        }

        stage('Run Java Automation Tests') {
            steps {
                script {
                    bat '''
                     cd D:\\WorkNXL\\worknxl
                     mvn test
                    '''
                }
            }
        }

        stage('Cleanup') {
            steps {
                bat 'docker-compose down'
            }
        }
    }
}

pipeline {
    agent any

    stages {
        stage('Build') {
            steps {
                echo 'Building..'
            }
        }
        stage('Test') {
            steps {
                echo 'Testing..'
            }
        }
        stage('Updating and pushing changes') {
            when {
                not {
                    branch 'main'
                }
            }
            steps {
                echo 'Updating and pushing changes to the repository...'
            }
        }
        stage('Deploy') {
            when {
                branch 'main'
            }

            steps {
                echo 'Deploying....'
            }
        }
    }
}
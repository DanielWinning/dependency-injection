pipeline {
    agent any

    options { skipDefaultCheckout() }

    stages {
        stage('Checkout') {
            steps {
                cleanWs()
                checkout scm
            }
        }
        stage('Build') {
            steps {
                sh 'composer install'
                sh 'npm install'
            }
        }
        stage('Test') {
            steps {
                sh 'composer test'
            }
        }
        stage('Updating and pushing changes') {
            when {
                branch 'dev'
            }
            steps {
            // I need to give the path to the Jenkins workspace as the first argument
                //sh 'curl -s https://pkg.dannyxcii.co.uk/scripts/composer-updater.sh | bash -s -- /var/lib/jenkins/workspace/dependency-injection-component/'
                echo pwd()
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
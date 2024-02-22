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
                not {
                    branch 'main'
                }
            }
            steps {
//                 sh '''
//                 cpath=/var/lib/jenkins/workspace/dependency-injection-component/dev/composer.json
//                 chpath=/var/lib/jenkins/workspace/dependency-injection-component/dev/CHANGELOG.md
//                 rpath=/var/lib/jenkins/workspace/dependency-injection-component/dev/README.md
//                 curl -s https://pkg.dannyxcii.co.uk/scripts/composer-updater.sh | bash -s -- "$cpath" "$chpath" "$rpath" dev
//                 '''
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
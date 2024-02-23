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
                sh 'echo "$GIT_BRANCH"'
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
                sh '''
                #cpath=/var/lib/jenkins/workspace/dependency-injection-component/dev/composer.json
                #chpath=/var/lib/jenkins/workspace/dependency-injection-component/dev/CHANGELOG.md
                #rpath=/var/lib/jenkins/workspace/dependency-injection-component/dev/README.md
                #curl -s https://pkg.dannyxcii.co.uk/scripts/composer-updater.sh | bash -s -- "$cpath" "$chpath" "$rpath" dev
                '''
            }
        }
        stage('Deploy') {
            when {
                branch 'main'
            }

            steps {
                sh '''
                git global --config user.email "Jenkins@user.noreply.github.com"
                git global --config user.name "Jenkins [bot]"
                git stash
                git fetch origin main
                git checkout main
                current_version=$(git describe --tags --abbrev=0)
                git tag "$current_version"
                git push --tags
                '''
            }
        }
    }
}
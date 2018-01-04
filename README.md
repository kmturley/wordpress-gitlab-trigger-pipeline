# wordpress-gitlab-trigger-pipeline

Wordpress Plugin which triggers a Gitlab Pipeline when user publishes a post. Ideal for static generation tasks. For use with:
* Wordpress
* Gitlab


## Installation

Clone the repository to your Wordpress plugins folder at:

    /wp-content/plugins/wordpress-gitlab-trigger-pipeline/

Activate the plugin via the wordpress interface at:

    http://localhost:8080/wp-admin/plugins.php

Go to your Gitlab project and add a new Pipeline trigger at:

    https://gitlab.com/username/project-name/settings/ci_cd

Then go to your server environment configuration e.g:

    Elastic Beanstalk > Configuration > Software Configuration

Set the environment variables using id and token from your Gitlab Pipeline trigger:

    GITLAB_TRIGGER_ID: XX
    GITLAB_TRIGGER_TOKEN: XX


## Usage

Go to your Wordpress Admin for posts:

    http://localhost:8080/wp-admin/edit.php

Publish an existing or new post and then check Gitlab pipeline to see it triggered.


## Directory structure

    gitlab-trigger-pipeline.php      --> Wordpress Plugin Code
    readme.txt                       --> Wordpress Plugin Readme


## Contact

For more information please contact kmturley

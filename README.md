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

Set the Gitlab variables in the 'Settings' > 'General' section on WordPress, using your Gitlab branch, trigger id and token:

    GITLAB BRANCH: XX
    GITLAB TRIGGER ID: XX
    GITLAB TRIGGER TOKEN: XX


## Usage

Go to your Wordpress Admin for posts:

    http://localhost:8080/wp-admin/edit.php

Publish an existing or new post and then check Gitlab pipeline to see it triggered.


## Directory structure

    gitlab-trigger-pipeline.php      --> Wordpress Plugin Code
    readme.txt                       --> Wordpress Plugin Readme


## Contact

For more information please contact kmturley

# The Telomere Project
https://thetelomereproject.org

This site is hosted on GoDaddy, but we use the GitHub repository as the source of truth for this project. **Do not commit WordPress core files or uploaded assets here.**

All work on this repository should be done in feature branches. When you are feature-complete, please create a Pull Request to merge your work into master. Having your branch up to date with master is your responsibility as the developer, so please resolve any conflicts prior to creating your PR. There is a PR template in this repository that should be filled out with an PR or your PR may be rejected.

## Site Defaults
* DOCROOT: ./
* VIRTUAL_HOST: telomere.docksal
* XDEBUG_ENABLED: false

Should you wish to change any of these settings for your local environment, please add the appropriate variables to your `docksal-local.env` file prior to running `fin init`.

## Features
* Adds hosts record with VIRTUAL_HOST
* Downloads WordPress core on initial setup

## Setup instructions

1. Clone this repo into your Projects directory.

    ```
    git clone git@github.com:kwhite/telomereproject.git
    cd telomereproject
    ```

1. Initialize the site.

    This will initialize local settings and install the site via wp-cli:

    ```
    fin init
    ```

1. Download a copy of the site database from the most recent restore point in WP Engine. The credentials are stored in LastPass. Put the file in your project root. Then run the following commands.
    ```
    cd certent
    fin wp db import mysql.sql
    fin wp search-replace 'https://thetelomereproject.org' 'http://telomere.docksal'
    ```

1. Proxy the files directory to the production site on GoDaddy. This will need to be done in your `docksal-local.env` file. Copy the following lines to your config.

    ```
    TBD
    ```

    Alternatively, you can just download the `uploads` directory to your local from GoDaddy over SFTP (not recommended).

1. Point your browser to `http://telomere.docksal`

1. Happy Pressing!

## Troubleshooting tips
**Serving `uploads` locally**

If you choose to serve the uploads directory locally and you run into read permission errors on site load, try running the following command from within the `telomereproject` directory.
```
sudo chmod -R 755 uploads
```

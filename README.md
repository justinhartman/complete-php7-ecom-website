# Advanced PHP 7 eCommerce Website

An advanced and complete PHP 7 eCommerce website along with MySQL database and
Admin interface.

###### Table of Contents

<!-- MarkdownTOC -->

- [Getting Started](#getting-started)
    - [Prerequisites](#prerequisites)
    - [Installing](#installing)
        - [Installing required packages](#installing-required-packages)
        - [Create MySQL/MariaDB Database](#create-mysqlmariadb-database)
        - [Update Config Variables](#update-config-variables)
        - [Run Webserver](#run-webserver)
- [Funding](#funding)
- [Contributing](#contributing)
- [Code of Conduct](#code-of-conduct)
- [Versioning](#versioning)
- [Change-Log](#change-log)
- [Authors](#authors)
- [License](#license)
- [Acknowledgements](#acknowledgements)

<!-- /MarkdownTOC -->

## Getting Started

These instructions will get your copy of the project up and running on your
local machine for development and testing purposes. [See deployment][deploy]
for notes on how to deploy the project on a live system.

### Prerequisites

You will need the following running on your local development machine.

- Apache or Nginx
- PHP 7.*
- MySQL or MariaDB

### Installing

Follow the instructions below and your website will be up and running in a few minutes.

#### Installing required packages

Before doing anything you will need to install the required packages using [composer](https://getcomposer.org/). Running composer installs the `dotenv` project which allows you to configure your website using a `.env` file.

```console
$ composer install
Loading composer repositories with package information
Installing dependencies (including require-dev) from lock file
Package operations: 1 install, 0 updates, 0 removals
  - Installing vlucas/phpdotenv (v2.5.1): Downloading (100%)
Generating autoload files
> /bin/cp config/.env.prod config/.env
> /bin/cp config/.htaccess.prod .htaccess
```

#### Create MySQL/MariaDB Database

Using whatever way you do, you need to create a new MySQL database. When creating the database, call it `ecommerce` so that you can import the SQL queries successfully into your new database.

To populate the database with data, there is a file in the `config` folder called `/config/db_dump.sql`. You need to import this SQL file into the database using your preferred method. I recommend using [phpMyAdmin](https://www.phpmyadmin.net/) to import the database queries but if you use a command line you would need to execute the following command.

```console
$ mysql -u DB_USERNAME -p ecommerce < ./config/db_dump.sql
```

Be sure to replate `DB_USERNAME` with the name of your MySQL username.

The next step is to populate the configuration files with your new database connection details.

#### Update Config Variables

After you've run `composer install` you will see a file called `/config/.env` in the config directory. You need to populate this file with your database connection settings.

Make sure you uncomment these lines and populate it with your database connection details:

```env
# Database configuration
########################
export DB_HOSTNAME='localhost'
export DB_USERNAME='root'
export DB_PASSWORD='pass'
export DB_DATABASE='ecommerce'
export DB_PORT='3306'
# export DB_SOCKET=''
```

There are many other settings in the `/config/.env` file you are most likely going to want to set. At the very least, you should update the `General Configuration` settings to your own environment.

These are the settings you can configure for your store.

- General Configuration
- Company Information
- Database configuration
- Google Maps API Key
- Social Media Profiles

#### Run Webserver

Once you have the database up and running you can start the webserver (see command below) and you should see your newly created website running at <http://localhost:8000>.

```console
$ php -S localhost:8000
[Fri Aug  7 10:43:59 2020] PHP 7.4.8 Development Server (http://localhost:8000) started
[Fri Aug  7 10:44:02 2020] [::1]:51358 Accepted
```

## Funding

If you find this project valuable, please consider [giving us a small donation][paypal] to help keep the project alive. We can really do with the support to help us continue to maintain this project.

## Contributing

Please read the [CONTRIBUTING.md][CONTRIBUTING] file for details on how you
can get involved in the project as well as the process for submitting bugs
and pull requests.

## Code of Conduct

Please read the [CODE_OF_CONDUCT.md][COC] file for the guidelines that govern
the community.

## Versioning

We use [Semantic Versioning][semver] for software versions of this project.
For a list of all the versions available, see the [tags][tags] and
[releases][releases] on this repository.

## Change-Log

View the [CHANGELOG.md][changelog] file for a detailed list of changes,
along with specific tasks completed for each version released to date.

## Authors

- Justin Hartman - [@justinhartman][author-1]

Also see the list of [contributors][contribs] who have participated in this
project.

## License

This project is licensed under the `GNU Affero General Public License` License.
See the [LICENSE][license] file for full details.

## Acknowledgements

Special thanks go out to the following people and projects who have helped in
some way to make this project a reality.

- [CodingCyber][shopping-source] for the original source code that formed the
  basis of this project.
- [@justinhartman/.github][.github] for the Github project templates.

[deploy]: #deployment
[CONTRIBUTING]: CONTRIBUTING.md
[COC]: CODE_OF_CONDUCT.md
[license]: LICENSE
[changelog]: CHANGELOG.md
[semver]: http://semver.org
[tags]: https://github.com/justinhartman/complete-php7-ecom-website/tags
[releases]: https://github.com/justinhartman/complete-php7-ecom-website/releases
[contribs]: https://github.com/justinhartman/complete-php7-ecom-website/contributors
[author-1]: https://github.com/justinhartman
[.github]: https://github.com/justinhartman/.github
[shopping-source]: https://codingcyber.org/simple-shopping-cart-application-php-mysql-6394/
[paypal]: https://paypal.me/22digital

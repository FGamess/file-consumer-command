[![CircleCI](https://circleci.com/gh/fgamess/file-consumer-command/tree/master.svg?style=svg)](https://circleci.com/gh/fgamess/file-consumer-command/tree/master) [![Dependency Status](https://gemnasium.com/badges/github.com/fgamess/file-consumer-command.svg)](https://gemnasium.com/github.com/fgamess/file-consumer-command)


# File Consumer Command
------------------------

A symfony command to display the most frequent words and their occurence using limit.

## Table of contents
- [Prerequisites](https://github.com/FGamess/file-consumer-command#prerequisites)
  - [Tools required](https://github.com/FGamess/file-consumer-command#tools-required)
  - [Set up the docker stack](https://github.com/FGamess/file-consumer-command#set-up-the-docker-stack)
  - [Setting www-data as owner of the files](https://github.com/FGamess/file-consumer-command#setting-www-data-as-owner-of-the-files)
  - [Install the vendors](https://github.com/FGamess/file-consumer-command#install-the-vendors)
- [How to use](https://github.com/FGamess/file-consumer-command#how-to-use)
  - [Display the most frequent words using limit](https://github.com/FGamess/file-consumer-command#display-the-most-frequent-word-using-limit)
- [Testing](https://github.com/FGamess/file-consumer-command#testing)
  - [Run the tests](https://github.com/FGamess/file-consumer-command#run-the-tests)


Prerequisites
-------------

###### Tools required

- Docker CE for Windows, Docker CE for Linux or Docker CE for MAC installed
- Docker compose installed

###### Set up the docker stack

1. From the root folder of the application.

    cd docker

2. Install and start the Docker stack.

The docker stack is composed by 2 containers : php7 (latest) and nginx. All the configuration is done. You will just need to specify the database host in Symfony parameters.yml

Using Docker CE on Linux (Ubuntu, Debian, Fedora...) or Docker CE on Windows (it will use docker-compose.yml file) :

    docker-compose build
then

    docker-compose up -d
Sometimes, it is possible that the database container does not start.
Just run this command :

    docker-compose start

You only need this command. It will start the containers (php7, nginx). Keep this terminal windows open.

###### Setting www-data as owner of the files.

Set www-data user and group as owner of the files inside the project. Connect to the php container with the root user using this command

    docker exec -it file_consumer_php bash
When you are in the bash run

    chown -R www-data:www-data .
Exit from the bash

    exit

###### Install the vendors

1. Connect to the php container with the www-data user.

    docker exec -itu www-data file_consumer_php bash

2. Then install the vendors with composer (already installed in the php container).

    composer install


How to use
----------

###### Display the most frequent words using limit

1. Connect to the php container with the www-data user.


    docker exec -itu www-data file_consumer_php bash

2. Then execute the following command


    bin/console app:consume-file flatland.txt 100

We actually use a file located at the root folder of this application but you can use any url targeting a file.


Testing
-------

###### Run the tests

1. Unit tests

Just run


    vendor/bin/phpunit tests/Unit

2. Functional tests

Just run


    vendor/bin/phpunit tests/Functional

3. All tests

Just run


    vendor/bin/phpunit tests

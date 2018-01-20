# File Consumer Command
[![Build Status](https://travis-ci.org/fgamess/file-consumer-command.svg?branch=master)](https://travis-ci.org/fgamess/file-consumer-command) [![CircleCI](https://circleci.com/gh/fgamess/file-consumer-command/tree/master.svg?style=svg)](https://circleci.com/gh/fgamess/file-consumer-command/tree/master) [![Dependency Status](https://gemnasium.com/badges/github.com/fgamess/file-consumer-command.svg)](https://gemnasium.com/github.com/fgamess/file-consumer-command)
------------------------

A Symfony 4 command to display the most frequent words and their occurence using limit.

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
- Docker Compose installed

###### Set up the docker stack

Install and start the Docker stack.

The docker stack is composed by 2 containers : php7 (latest) and nginx. All the configuration is done.

Using Docker CE :

    docker-compose build
then

    docker-compose up -d

You only need this command. It will start the containers (php7, nginx).

###### Setting www-data as owner of the files.

Set www-data user and group as owner of the files inside the project. Connect to the php container with the root user using this command

    docker exec -it file_consumer_php bash
When you are in the bash run

    chown -R www-data:www-data .
Exit from the bash

    exit

###### Install the vendors

Connect to the php container with the www-data user:

    docker exec -itu www-data file_consumer_php composer install


How to use
----------

###### Display the most frequent words using limit

Connect to the php container with the www-data user:


    docker exec -itu www-data file_consumer_php bin/console app:consume-file flatland.txt 100

We actually use a file located at the root folder of this application but you can use any url targeting a file.


Testing
-------

###### Run the tests

1. Unit tests

Just run


    ./bin/phpunit tests/Unit

2. Functional tests

Just run


    ./bin/phpunit tests/Functional

3. All tests

Just run


    ./bin/phpunit

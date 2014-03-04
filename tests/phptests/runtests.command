#!/bin/bash

#php phpunit.phar --bootstrap _testbootstrap.php reviewmodeltest.php
php phpunit.phar --stderr reviewmodeltest.php

exit
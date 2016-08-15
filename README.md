ITLeague
========

[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/kseta/ITLeague/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/kseta/ITLeague/?branch=master) [![Code Coverage](https://scrutinizer-ci.com/g/kseta/ITLeague/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/kseta/ITLeague/?branch=master)

This is Baseball League Application.

Requirements
-------------------------------------

- PHP 7.0.0 or higher.
- PDO-MySQL PHP extension enabled.
- [Symfony application requirements].

Installation
-------------------------------------

This application using Composer.

```
$ composer install
```

This command will database create and migration.

```
$ php app/console doctrine:database:create
$ php app/console doctrine:migrations:migrate
```

If you need quick set up with sample data, try this.

```
$ php app/console hautelook_alice:doctrine:fixtures:load --purge-with-truncate.
```

Usage
-------------------------------------

Just use the PHP build-in web server.

```
$ php app/console server:start
```

This command will start a web server for application.


License
-------------------------------------

[BSD-2-Clause]

Copyright (c) 2016 SETA Keigou and contributors, All rights reserved.

[Symfony application requirements]: http://symfony.com/doc/current/reference/requirements.html
[BSD-2-Clause]: https://opensource.org/licenses/BSD-2-Clause

Composer Runtime Libary
=============
[![Latest Stable Version](https://poser.pugx.org/johnitvn/composer-runtime/v/stable)](https://packagist.org/packages/johnitvn/composer-runtime)
[![License](https://poser.pugx.org/johnitvn/composer-runtime/license)](https://packagist.org/packages/johnitvn/composer-runtime)
[![Total Downloads](https://poser.pugx.org/johnitvn/composer-runtime/downloads)](https://packagist.org/packages/johnitvn/composer-runtime)
[![Monthly Downloads](https://poser.pugx.org/johnitvn/composer-runtime/d/monthly)](https://packagist.org/packages/johnitvn/composer-runtime)
[![Daily Downloads](https://poser.pugx.org/johnitvn/composer-runtime/d/daily)](https://packagist.org/packages/johnitvn/composer-runtime)

Library for run composer in runtime without worrying about where it is installed


Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist johnitvn/composer-runtime "*"
```

or add

```
"johnitvn/composer-runtime": "*"
```

to the require section of your `composer.json` file.


Usage
-----

````php
$process = new ComposerProcess('path\to\working_dir');
$process->runDisplayOutput('install');
````

The defaut composer and composer.phar will searched in local working directory or in system enviroment path.
Process will throw `ComposerNotInstalledException` if composer not found. You can custom composer command if you installed compsoer but not set it in system enviroment

````php
$process = new ComposerProcess('path\to\working_dir');
$process->setCommand('php /path/to/composer.phar');
$process->runDisplayOutput('install');
````

You have 3 options for run composer command

````php
// Run command whithout any output
process->run($params) 
// Run command and capture output to output reference variable
process->runCapture($params, array &$output) 
// Run command and display output directly
process->runDisplayOutput($params) 
````

You can see [cli-runtime](https://github.com/johnitvn/cli-runtime) for more detail.

If you want to run composer command with multiple parameters. Let call run method with array. 
Example

````php
process->run(['install','-v']) 
process->runCapture(['install','-v'],$output)
$process->runDisplayOutput(['install','-v']);
```` 

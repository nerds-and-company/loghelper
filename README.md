#  Log Helper plugin for Craft CMS

## Introduction

When [logging events and errors](https://craftcms.com/support/logs-and-backups),
Craft CMS writes to the `craft/storage/runtime/logs/craft.log.` and
`craft/storage/runtime/logs/phperrors.log` files.

This can cause problems on hosting environments that have an ephemeral
filesystem (like Heroku, Amazon EC2 and some Docker configurations) as
the log files will not be persisted and logging data will get lost.

This plugin adds the ability to Craft CMS to redirect logging output to
other sources than the default log files.

## Installation

This plugin can be installed manually or [using Composer](https://getcomposer.org/doc/00-intro.md).

### Composer

The preferred means of installation is through Composer:

    composer require nerds-and-company/loghelper

This will add `nerds-and-company/loghelper` as a requirement to your
projects `composer.json` file and install the plugin into the
`craft/plugins/loghelper` directory.

### Manual

If installation through Composer is not an option, the package can also
be installed manually. Download [the latest release](https://github.com/nerds-and-company/loghelper/releases/latest)
or clone the contents of this repository into the `craft/plugins/loghelper`
directory.

__Important:__

The plugin's folder **must** be named "loghelper"

## Usage

This plugin offers different types of behaviour that can be configured
by editing/adding the `craft/config/logHelper.php` config file.

### Configuration

The following settings are available:

#### useFileLog

<table>
<tr><td>Accepts</td><td><code>true</code> or <code>false</code></td></tr>
<tr><td>Default</td><td><code>true</code></td></tr>
<tr><td>Since</td><td>v2.0.0</td></tr>
</table>

Determines whether logs should be written to file or not.
This allows for disabling Craft's default behaviour.

    'useFileLog' => true,

#### useProfileLog

<table>
<tr><td>Accepts</td><td><code>true</code> or <code>false</code></td></tr>
<tr><td>Default</td><td><code>true</code></td></tr>
<tr><td>Since</td><td>v2.0.0</td></tr>
</table>

Determines whether or not to displays profiling results in the browser's console window.
This allows for disabling Craft's default behaviour.

    'useProfileLog' => true,

#### useStdErrLog

<table>
<tr><td>Accepts</td><td><code>true</code> or <code>false</code></td></tr>
<tr><td>Default</td><td><code>false</code></td></tr>
<tr><td>Since</td><td>v2.0.0</td></tr>
</table>

Determines whether logs should be written to STDERR (shell error output stream) or not.
Enabling this allows for viewing Craft logs on Heroku (or in tools that persist Heroku logs, like Papertrail).

    'useStdErrLog' => false,

#### useSysLog

<table>
<tr><td>Accepts</td><td><code>true</code> or <code>false</code></td></tr>
<tr><td>Default</td><td><code>false</code></td></tr>
<tr><td>Since</td><td>v2.0.0</td></tr>
</table>

Determines whether logs should be written to [the system logs](https://en.wikipedia.org/wiki/Syslog) or not.
Enabling this allows tools that read from the system logs (like Papertrail when not on Heroku) to persist Craft logs.

    'useSysLog' => false,

#### useWebLog

<table>
<tr><td>Accepts</td><td><code>true</code> or <code>false</code></td></tr>
<tr><td>Default</td><td><code>true</code></td></tr>
<tr><td>Since</td><td>v2.0.0</td></tr>
</table>

Determines whether or not to displays log content in the browser's console window.
This allows for disabling Craft's default behaviour.

    'useWebLog' => true,

## Screenshots

### Docker

![Docker](http://nerds-and-company.github.io/loghelper/images/docker.png)

### Heroku

![Heroku](http://nerds-and-company.github.io/loghelper/images/heroku.png)

### Papertrail

![Papertrail](http://nerds-and-company.github.io/loghelper/images/papertrail.png)

## License

This plugin has been licensed under the MIT License (MIT). Please see [License File](LICENSE) for more information.

##  Changelog

### 2.0.2

- Fixed bug with reading default config values

### 2.0.1

- Adds more documentation

### 2.0.0

- Adds support for syslog logging, which is the default for Papertrail (non-Heroku)
- Adds the ability to remove web, file and profile logging
- Improves readability of the logs by appending newlines

### 1.0.0

- Initial release

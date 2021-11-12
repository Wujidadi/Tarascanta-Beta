# Tarascanta (Beta)

Beta version of [Tarascanta](https://github.com/Wujidadi/Tarascanta).


## Development Logs

### 2021-11-12
* Add constant `TimeZoneSuffix` in `Framework/helpers`.

### 2021-11-08
* Adjust type declarations of functions and parameters in some library classes to the manner of PHP 8.

### 2021-11-07
* Introduce HTTP request/response handling libraries.
* Enhance type declarations of all functions and classes.
* DBAPI changes:
  1. Enhance supporting of query parameters in array.
  2. Add supporting of the types of query parameters.
* Add function `SumWord` in `Framework/helpers`.

### 2021-09-19
* Change the order in code of the constructor of some classes.
* Move doc comments to front of the methods of parent classes if there are inheritance relation between two classes.

### 2021-09-05
* Add project initialization command to tool `canta`.

### 2021-09-04
* Modify the heredoc identifiers in migration classes to `SQL` from original `EOT`.
* Change the behaviour while a PDOException is met in DB migration (return `false` -> throw new Exception with code 35).

### 2021-08-26
* Add `--verbose` option to tool `canta` to enable to display the raw message of the original command execution. 

### 2021-08-23
* Introduction of the tool of JavaScript codes minimizing and obfuscating (base on npm packages `webpack`, `webpack-cli` and `terser-webpack-plugin`).
* Introduntion of the tool of CSS codes minimizing (base on npm packages `clean-css` and `clean-css-cli`).

### 2021-08-15
* Update structure of DB config file, `DBAPI::getInstance()`, constructors and extending ways of `Migration`, `Model` and their children classes for fitting multiple DB configurations.

### 2021-08-14
* Reorganize the migration classes.
* Move startup scripts of `bin` and `tools` to the `bootstrap` directory and update the file structure of `bootstrap`.
* Add instruction comment to `canta`.

### 2021-08-13
* Add `bin` directory.
* Update codes about database migrations.
* Update `DBAPI` and the parent class of Model.

### 2021-08-12
* Use Composer and replace my autoload with Composer's. (The autoload of myself is given up).

### 2021-08-10
* Update `Logger` libary.
* Update Framework `facades` library and `SASS2CSS` tool.
* Change the level of `Model` class.

### 2021-08-09
* Remove the constructor in `DemoModel` and revise PHPDoc of demo classes.
* Add migration and related mechanisms.

### 2021-08-08
* Updating synchronously with CPCF-LIBMS project from this day.
* Add `Models` directory under `App` and rename `Classes` to `Handlers`.
* Add `DBAPI` library and related config files.

### 2021-05-24
* Update about URI and log:
  1. Update the rewriting and basepath-setting rules of URI with related `env` configs.
  2. Update the `Logger` library and configs.
  3. Correct the codes related to the singleton pattern.
  4. Adjust the structure of directories under the `storage` folder.

### 2021-05-16
* Update the `canta` tool.
* Add function `VarExportFormat` to `helpers` library and use it to output autoload class map.

### 2021-05-15
* Remove the mechanism of singleton class extension.
* Add usage help to the `canta` tool.

### 2021-05-09
* Update the manner of comment and PHP doc.
* Add `loadJS` in the `tools` library.

### 2021-05-08
* Update the mechanism of autoload and introduce the command line tool `canta`.
* Add the welcome page with elvish/modern font styles.

### 2021-05-07
* Introduce the mechanism of autoload map and reorganize the names of directories (all top directories are renamed as lowercase).

### 2021-05-04
* Initialize the Git project.

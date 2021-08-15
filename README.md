# Tarascanta (Beta)

Beta version of [Tarascanta](https://github.com/Wujidadi/Tarascanta).


## Development Logs

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

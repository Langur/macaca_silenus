# Silenus - The model module of macaca

## Overview
Macaca is a content management system that provides a simple MVC framework.
Silenus provides a abstruct model class with sylvanus.

## Dependency
Silenus depends on Sylvanus, then  must be deploied with Sylvanus.

## Deploy
Silenus is deploied as a Git submodule.
Execute following command at deployed directory for macaca.

```
git submodule add https://github.com/Langur/macaca_silenus.git modules/sylenus
```

## Initializez
Modify *public/index.php* .
Add following code after Sylvanus initialization.

```
Silenus\init();
```

## License
This software is distributed under the MIT License. Please read LICENSE for information on the software availability and distribution.

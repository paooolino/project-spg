start the project
	npm run open

configuration
==============
web/config.php
There are two possible configurations: "TEST" and "PRODUCTION".
In TEST configuration, the database will be truncated and repopulated at each page reload.
	
Core class
===========
web/Spg/Core.php
Contains the core functions of the framework.
- get_request_slug

Api class
==========
web/Spg/Api.php
Contains the methods for database interaction. Database connection is here.
- get_node_by_slug

test data
============
web/populate_test_db.php

API console
============
http://127.0.0.1/project-spg/web/admin/console/
	

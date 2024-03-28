<?php
/////////////////////////////////////////////////////
// ROOT
define("TREE", $_SERVER["DOCUMENT_ROOT"] . "/");
/////////////////////////////////////////////////////

/////////////////////////////////////////////////////
/////////////////////////////////////////////////////
// DIRECTORY -> CORE
define("DIR_CORE", TREE . "core/");
/////////////////////////////////////////////////////

/////////////////////////////////////////////////////
// DIRECTORY -> API
define("DIR_API", DIR_CORE . "api/");
define("DIR_API_ACTIVE", DIR_API . "v1/");
define("DIR_API_DATABASE", DIR_API_ACTIVE . "database/");
define("DIR_API_ERROR", DIR_API_ACTIVE . "error/");
/////////////////////////////////////////////////////

/////////////////////////////////////////////////////
// DIRECTORY -> COMPONENT
define("DIR_COMPONENT", DIR_CORE . "component/");
/////////////////////////////////////////////////////

/////////////////////////////////////////////////////
// DIRECTORY -> KERNEL
define("DIR_KERNEL", DIR_CORE . "kernel/");
/////////////////////////////////////////////////////

/////////////////////////////////////////////////////
// DIRECTORY -> PAGE
define("DIR_PAGE", DIR_CORE . "page/");
define("DIR_PAGE_ROUTER", DIR_PAGE . "router/");
define("DIR_PAGE_ADMINISTRATOR", DIR_PAGE . "administrator/");
define("DIR_PAGE_GLOBAL", DIR_PAGE . "global/");
define("DIR_PAGE_PRIVATE", DIR_PAGE . "private/");
define("DIR_PAGE_SHARED", DIR_PAGE . "shared/");
/////////////////////////////////////////////////////

/////////////////////////////////////////////////////
// DIRECTORY -> SESSION
define("DIR_SESSION", DIR_CORE . "session/");
/////////////////////////////////////////////////////

/////////////////////////////////////////////////////
// DIRECTORY -> SHARED
define("DIR_SHARED", DIR_CORE . "shared/");
/////////////////////////////////////////////////////

/////////////////////////////////////////////////////
// DIRECTORY -> STYLE
define("DIR_STYLE", DIR_CORE . "style/");

// DIRECTORY STYLE -> DYNAMIC
define("DIR_STYLE_DYNAMIC", DIR_STYLE . "dynamic/");

// DIRECTORY STYLE -> STATIC
define("DIR_STYLE_STATIC", DIR_STYLE . "static/");
define("DIR_STYLE_STATIC_ROOT", DIR_STYLE_STATIC . "root/");
define("DIR_STYLE_STATIC_SERVER", DIR_STYLE_STATIC . "server/");
/////////////////////////////////////////////////////

/////////////////////////////////////////////////////
// DIRECTORY -> TOOL
define("DIR_TOOL", DIR_CORE . "tool/");
/////////////////////////////////////////////////////
/////////////////////////////////////////////////////

/////////////////////////////////////////////////////
/////////////////////////////////////////////////////
// DIRECTORY -> DATA
define("DIR_DATA", TREE . "data/");

/////////////////////////////////////////////////////
// DIRECTORY DATA -> GLOBAL, PRIVATE, SHARED
define("DIR_DATA_GLOBAL", DIR_DATA . "global/");
define("DIR_DATA_PRIVATE", DIR_DATA . "private/");
define("DIR_DATA_SHARED", DIR_DATA . "shared/");

define("DIR_DATA_GLOBAL_LANGUAGE", DIR_DATA_GLOBAL . "language/");
/////////////////////////////////////////////////////
/////////////////////////////////////////////////////
?>
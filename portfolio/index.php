<?php

require_once "includes/fetch.php";

ob_start();

include "components/hero.php";
include "components/about.php";
include "components/project.php";
include "components/education.php";
include "components/contact.php";

$frontend_content = ob_get_clean();

include "../layout/frontend-layout/app.php";
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'LandingPageController';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// Route for Login Feature
$route['signin-form'] = 'LoginController';
$route['signin'] = 'LoginController/prosesLogin';
$route['signout'] = 'LoginController/authout';

// Route for Register Feature
$route['signup-form'] = 'RegisterController';
$route['signup'] = 'RegisterController/prosesRegist';

//Route for Dashboard
$route['dashboard'] = 'DashboardController';

//Route for Profile
$route['profile'] = "ProfileController";
$route['editProfile'] = "ProfileController/editForm";
$route['editProses'] = "ProfileController/editProcess";

//Route for Story
$route['new-story'] = "StoryController";
$route['new-story/proses'] = "StoryController/newStoryProses";
$route['story/(:any)'] = "StoryController/detailStory/$1";
$route['story/(:any)/edit'] = "StoryController/editStoryPage/$1";
$route['story/edit/proses/(:any)'] = "StoryController/editStoryProses/$1";
$route['story/discover/(:any)'] = "StoryController/discoverPage/$1";
	//Route for chapter
$route['chapter/tiny-mce-upload'] = 'StoryController/tinymceUpload';
$route['chapter/tiny-mce-delete'] = 'StoryController/delete_image';
$route['chapter/read/(:any)'] = 'StoryController/renderChapterDetail/$1';
$route['chapter/edit/(:any)'] = 'StoryController/renderChapterEdit/$1';
$route['chapter/edit/(:any)/proses'] = 'StoryController/editChapterProses/$1';
$route['chapter/delete/(:any)'] = 'StoryController/deleteChapterProses/$1';
$route['story/(:any)/create-chapter'] = 'StoryController/renderCreateChapter/$1';
$route['story/(:any)/create-chapter/create'] = 'StoryController/newChapterProses/$1';
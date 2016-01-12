###################
What is CodeIgniter
###################

CodeIgniter is an Application Development Framework - a toolkit - for people
who build web sites using PHP. Its goal is to enable you to develop projects
much faster than you could if you were writing code from scratch, by providing
a rich set of libraries for commonly needed tasks, as well as a simple
interface and logical structure to access these libraries. CodeIgniter lets
you creatively focus on your project by minimizing the amount of code needed
for a given task.

*******************
Libraries Used
*******************

1. http://www.grocerycrud.com/codeigniter-simplicity
2. https://cartalyst.com/manual/sentry/2.1
3. https://github.com/dwightwatson/codeigniter-breadcrumb
4. https://github.com/chriskacerguis/codeigniter-restserver


Sentry 
Basically you have to..

Create your groups

Sentry::getGroupProvider()->create([
    'name' => 'Super Administrators',
    'permissions' => [
        'system' => 1,
    ],
]);

Sentry::getGroupProvider()->create([
    'name' => 'Managers',
    'permissions' => [
        'system.products' => 1,
        'system.store' => 1,
        'system.profile' => 1,
    ],
]);
Set a group to a particular user, in this case it is setting Managers to the current logged user

Sentry::getUser()->addGroup( Sentry::getGroupProvider()->findByName('Managers') );
Check if a user has a particular access

if ( Sentry::getUser()->hasAnyAccess(['system','system.products']) )
{
    // Will be able to do a thing
}
Check if a user is Super Administrator (only this group has the 'system' access)

if ( Sentry::getUser()->hasAnyAccess(['system']) )
{
    // Will be able to do a thing
}
Get all groups from a particular user

try
{
    // Find the user using the user id
    $user = Sentry::getUserProvider()->findById(1);

    // Get the user groups
    $groups = $user->getGroups();
}
catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
{
    echo 'User was not found.';
}
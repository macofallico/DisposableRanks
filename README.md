# Disposable Ranks and Awards Module

Module is compatible with any the latest development build of phpVMS v7 released after **23.APR.2021**. Provides;

* Ranks Page (with allowed Subfleets if there are any)
* Awards Page

## Installation Steps

* Manual Install : Upload contents of the package to your root/modules folder via ftp or your control panel's file manager 
* GitHub Clone : Clone/pull repository to your root/modules/DisposableRanks folder
* PhpVms Module Installer : Go to `admin -> addons/modules` , click `Add New` , select downloaded file and click `Add Module`

Go to admin section and enable the module, that's all (only needed for Manual Install and Github Clone)
After enabling/disabling modules an app cache cleaning process IS necessary (check admin/maintenance)

## Usage

If you want to enable module auto links, then enable frontend link registration commands in ModuleFolder\Providers\....ServiceProvider.php file as shown below,  
*Two forward slashes (//) = Disabled, No forward slashes = Enabled*

```php
  $this->moduleSvc->addFrontendLink('Ranks', '/dranks', 'fas fa-tags', $logged_in=true);
  // $this->moduleSvc->addFrontendLink('Awards', '/dawards', 'fas fa-trophy', $logged_in=true);
```

Disposable Theme v2 IS capable of recognizing and showing proper links for Disposable Modules but if you need some more control, then you can add links to your navbar (or any other place) with below examples;

```html
<li>
  <a class="nav-link" href="{{ route('DisposableRanks.dranks') }}">
    <i class="fas fa-tags"></i>
    <span>Ranks</span>
  </a>
</li>

<li>
  <a class="nav-link" href="{{ route('DisposableRanks.dawards') }}">
    <i class="fas fa-trophy"></i>
    <span>Awards</span>
  </a>
</li>
```

*(Best way to add links in Laravel structure is to use routes like above, but plain html href="/dranks" is also possible)*

## Duplicating Module Blades/Views

Technically all blade files should work with your template but they are mainly designed for Bootstrap compatible themes. So if something looks weird in your template then you need to edit them. I kindly suggest copying them under your theme folder and do your changes there, directly editing module files will only make updating harder for you.

All Disposable Modules are capable of displaying customized files located under your theme folders;

* Original Location : `root/modules/DisposableModule/Resources/Views/somefile.blade.php`
* Target Location   : `root/resources/views/layouts/YourTheme/modules/DisposableModule/somefile.blade.php`

## Update Notes

Nothing updated so far.

# Disposable Ranks and Awards Module for phpVMS v7

This module is compatible with the latest dev build as of 23APR2021, there is no need to modify any default files.\
Technically all blade files (views/pages or whatever you call them) should work with your template but they are mainly designed for Bootstrap compatible themes (like Disposable Themes, Stisla etc). 

So if something looks weird in your template then you need to edit them.

***** Manual Installation Steps 

Upload contents of the package (or pull/clone from GitHub) to your root/modules/DisposableRanks folder\
Go to admin section and enable the module, that's all\
After enabling/disabling modules an app cache cleaning process IS necessary (check admin/maintenance)

***** Usage

If you want to disable module auto links and add your own according to your template, then dashout 2 frontend link registration commands in the Providers\DisposableRanksServiceProvider.php file as shown below;\
(Two forward slashes will make them disabled.)

```
  // $this->moduleSvc->addFrontendLink('Ranks', '/dranks', 'fas fa-tags', $logged_in=true);
  // $this->moduleSvc->addFrontendLink('Awards', '/dawards', 'fas fa-trophy', $logged_in=true);
```
    
Then you can add links to your navbar/sidebar with below examples;

```
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

(Best way to add links in Laravel structure is to use routes like above, but plain html href="/dranks" is also possible)

You are free to edit any of the files as you wish, but please do not expect help/updates for the code you edited (controllers and providers)\
I always try to provide info and support but can not fix things you broke ;) Just share your thoughts about any improvements so we can think together before changing things.

Enjoy,\
Disposable\
23.APR.2021

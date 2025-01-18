<?php

namespace App\Providers\Filament;

use App\Filament\Resources\OrderResource;
use BezhanSalleh\FilamentShield\FilamentShieldPlugin;
use App\Filament\Resources\ProductCategoryResource;
use App\Filament\Resources\ProductResource;
use App\Filament\Resources\UnitResource;
use App\Filament\Resources\UserResource;
use App\Http\Middleware\RedirectIfAuthenticated;
use BezhanSalleh\FilamentShield\Resources\RoleResource;
use Filament\Forms\Components\FileUpload;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Navigation\NavigationBuilder;
use Filament\Navigation\NavigationGroup;
use Filament\Navigation\NavigationItem;
use Filament\Pages;
use Filament\Pages\Dashboard;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets;
use Hasnayeen\Themes\Http\Middleware\SetTheme;
use Hasnayeen\Themes\ThemesPlugin;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Jeffgreco13\FilamentBreezy\BreezyCore;
use Jeffgreco13\FilamentBreezy\Pages\MyProfilePage;
use Joaopaulolndev\FilamentGeneralSettings\FilamentGeneralSettingsPlugin;
use Joaopaulolndev\FilamentGeneralSettings\Pages\GeneralSettingsPage;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->login()
            ->colors([
                'primary' => Color::Amber,
            ])
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])
            ->sidebarCollapsibleOnDesktop(true)
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
            ->widgets([
                Widgets\AccountWidget::class,
                Widgets\FilamentInfoWidget::class,
            ])
            ->navigation(function (NavigationBuilder $builder): NavigationBuilder {
                return $builder
                    ->items([
                        ...Dashboard::getNavigationItems(),
                        ...OrderResource::getNavigationItems()
                    ])
                    ->groups([
                        NavigationGroup::make('Master Data Products')
                            ->icon('heroicon-o-circle-stack')
                            ->items([
                                NavigationItem::make('Categories')
                                    ->url(fn(): string => ProductCategoryResource::getUrl())
                                    ->isActiveWhen(fn(): bool => request()->routeIs('filament.admin.resources.product-categories.*')),
                                NavigationItem::make('Units')
                                    ->url(fn(): string => UnitResource::getUrl())
                                    ->isActiveWhen(fn(): bool => request()->routeIs('filament.admin.resources.units.*')),
                                NavigationItem::make('Products')
                                    ->url(fn(): string => ProductResource::getUrl())
                                    ->isActiveWhen(fn(): bool => request()->routeIs('filament.admin.resources.products.*'))
                            ]),
                        NavigationGroup::make('User and Access')
                            ->icon('heroicon-o-users')
                            ->items([
                                NavigationItem::make('Users')
                                    ->url(fn(): string => UserResource::getUrl())
                                    ->isActiveWhen(fn(): bool => request()->routeIs('filament.admin.resources.users.*')),
                                NavigationItem::make('Roles')
                                    ->url(fn(): string => RoleResource::getUrl())
                                    ->isActiveWhen(fn(): bool => request()->routeIs('filament.admin.resources.roles.*'))
                            ]),
                        NavigationGroup::make('Settings')
                            ->icon('heroicon-o-cog-6-tooth')
                            ->items([
                                NavigationItem::make('General Setting')
                                    ->url(fn(): string => GeneralSettingsPage::getUrl())
                                    ->isActiveWhen(fn(): bool => request()->routeIs('filament.admin.pages.general-settings-page')),
                                NavigationItem::make('Profile')
                                    ->url(fn(): string => MyProfilePage::getUrl())
                                    ->isActiveWhen(fn(): bool => request()->routeIs('filament.admin.pages.my-profile'))
                            ])
                    ]);
            })
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
                SetTheme::class,
            ])
            ->authMiddleware([
                Authenticate::class,
                // RedirectIfAuthenticated::class
            ])
            ->plugins([
                FilamentShieldPlugin::make(),
                BreezyCore::make()
                    ->myProfile(
                        shouldRegisterUserMenu: true,
                        hasAvatars: true
                    )
                    ->avatarUploadComponent(fn() => FileUpload::make('avatar')->avatar()),
                ThemesPlugin::make(),
                FilamentShieldPlugin::make()
                    ->gridColumns([
                        'default' => 1,
                        'sm' => 2,
                    ])
                    ->sectionColumnSpan(1)
                    ->checkboxListColumns([
                        'default' => 1,
                        'sm' => 2,
                        'lg' => 4,
                    ])
                    ->resourceCheckboxListColumns([
                        'default' => 1,
                        'sm' => 2,
                    ]),
                FilamentGeneralSettingsPlugin::make()
            ]);
    }
}

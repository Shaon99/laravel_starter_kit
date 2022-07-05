<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a class="text-white" href="{{ route('admin.home') }}">{{ @$general->sitename }}
            </a>
        </div>

        <ul class="sidebar-menu">

            <li class="nav-item dropdown {{ menuActive('admin.home') }}">
                <a href="{{ route('admin.home') }}" class="nav-link "><i
                        class="fas fa-fire"></i><span>{{ __('Dashboard') }}</span></a>
            </li>

            <li class="menu-header">{{ __('User Management') }}</li>

            <li class="nav-item dropdown {{ @$navManageUserActiveClass }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-users-cog"></i>
                    <span>{{ __('Manage Users') }}
                    </span></a>
                <ul class="dropdown-menu">
                    <li class="{{ @$subNavManageUserActiveClass }}">
                        <a class="nav-link" href="{{ route('admin.user') }}">{{ __('Manage Users') }}</a>
                    </li>

                    <li class="{{ @$subNavActiveUserActiveClass }}">
                        <a class="nav-link"
                            href="{{ route('admin.user.filter', 'active') }}">{{ __('Active Users') }}</a>
                    </li>

                    <li class="{{ @$subNavDeactiveUserActiveClass }}">
                        <a class="nav-link"
                            href="{{ route('admin.user.filter', 'deactive') }}">{{ __('Deactive Users') }} <span
                                class="badge badge-danger">{{ @$deactiveUser }}</span></a>
                    </li>


                </ul>
            </li>



            <li class="menu-header">{{ __('Email Settings') }}</li>

            <li class="nav-item dropdown {{ @$navEmailManagerActiveClass }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-envelope"></i>
                    <span>{{ __('Email Manager') }}</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ @$subNavEmailConfigActiveClass }}">
                        <a class="nav-link"
                            href="{{ route('admin.email.config') }}">{{ __('Email Configure') }}</a>
                    </li>
                    <li class="{{ @$subNavEmailTemplatesActiveClass }}">
                        <a class="nav-link"
                            href="{{ route('admin.email.templates') }}">{{ __('Email Templates') }}</a>
                    </li>

                    <li class="{{ @$subscriberActiveClass }}">
                        <a class="nav-link"
                            href="{{ route('admin.sendEmail') }}">{{ __('Email To Subscriber') }}</a>
                    </li>
                </ul>
            </li>


            <li class="menu-header">{{ __('System Settings') }}</li>

            <li class="nav-item dropdown {{ @$navGeneralSettingsActiveClass }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-cog"></i>
                    <span>{{ __('General Settings') }}</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ @$subNavGeneralSettingsActiveClass }}">
                        <a class="nav-link"
                            href="{{ route('admin.general.setting') }}">{{ __('General Settings') }}</a>
                    </li>

                    <li class="{{ @$subNavAnalyticsActiveClass }}">
                        <a class="nav-link"
                            href="{{ route('admin.general.analytics') }}">{{ __('Google Analytics') }}</a>
                    </li>
                    <li class="{{ @$subNavCookieActiveClass }}">
                        <a class="nav-link"
                            href="{{ route('admin.general.cookie') }}">{{ __('Cookie Consent') }}</a>
                    </li>
                    <li class="{{ @$subNavRecaptchaActiveClass }}">
                        <a class="nav-link"
                            href="{{ route('admin.general.recaptcha') }}">{{ __('Google Recaptcha') }}</a>
                    </li>
                    <li class="{{ @$subNavLiveChatActiveClass }}">
                        <a class="nav-link"
                            href="{{ route('admin.general.live.chat') }}">{{ __('Live Chat Setting') }}</a>
                    </li>
                
                    <li>
                        <a class="nav-link"
                            href="{{ route('admin.general.database') }}">{{ __('Database Backup') }}</a>
                    </li>
                    <li>
                        <a class="nav-link"
                            href="{{ route('admin.general.cacheclear') }}">{{ __('Cache Clear') }}</a>
                    </li>
                </ul>
            </li>



            <li class="nav-item dropdown {{ @$navManageLanguageActiveClass }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i
                        class="fas fa-globe-africa"></i>
                    <span>{{ __('Manage Language') }}</span></a>

                <ul class="dropdown-menu">

                    <li class="{{ @$subNavManageLanguageActiveClass }}"><a class="nav-link"
                            href="{{ route('admin.language.index') }}">{{ __('Manage Language') }}</a>
                    </li>
                </ul>

            </li>



            <li class="nav-item dropdown {{ @$navManagePagesActiveClass }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                    <span>{{ __('Frontend') }}</span>
                </a>

                <ul class="dropdown-menu">
                    <li class="{{ @$subNavPagesActiveClass }}">
                        <a class="nav-link" href="{{ route('admin.frontend.pages') }}">{{ __('Pages') }}</a>
                    </li>

                    @forelse($urlSections as $key => $section)
                        <li>
                            <a class="nav-link"
                                href="{{ route('admin.frontend.section.manage', ['name' => $key]) }}">{{ frontendFormatter($key) . ' Section' }}</a>
                        </li>
                    @empty

                    @endif
                </ul>

            </li>


            <li class="nav-item dropdown {{ menuActive('admin.subscribers') }}">
                <a href="{{ route('admin.subscribers') }}" class="nav-link "><i
                        class="fas fa-users"></i><span>{{ __('Newsletter Subscriber') }}</span></a>
            </li>

        </ul>

    </aside>
</div>

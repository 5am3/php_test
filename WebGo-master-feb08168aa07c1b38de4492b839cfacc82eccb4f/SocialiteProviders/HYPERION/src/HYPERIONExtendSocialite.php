<?php

namespace SocialiteProviders\HYPERION;

use SocialiteProviders\Manager\SocialiteWasCalled;

class HYPERIONExtendSocialite
{
    /**
     * Execute the provider.
     */
    public function handle(SocialiteWasCalled $socialiteWasCalled)
    {
        $socialiteWasCalled->extendSocialite('hyperion', __NAMESPACE__.'\Provider');
    }
}

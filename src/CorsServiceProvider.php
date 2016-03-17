<?php
/**
 * HomePage: https://github.com/yocome
 * Created by Yong.
 * Date: 2016/1/21
 * Time: 16:07
 */

/**
 * HomePage: https://github.com/386
 * Fixed by XiaoGai.
 * Date: 2016/3/17
 * Time: 17:00
 */

namespace 386\Cors;

use Illuminate\Support\ServiceProvider;

class CorsServiceProvider extends ServiceProvider
{
    /**
     * Register OPTIONS route to any requests
     */
    public function register()
    {

        $config = $this->app['config']['cors'];

        $this->app->bind('386\Cors\CorsService', function() use ($config){
            return new CorsService($config);
        });

        /** @var \Illuminate\Http\Request $request */
        $request = $this->app->make('request');
            if($request->isMethod('OPTIONS')) {
            $this->app->options($request->path(), function(){
                return response('', 200);
            });
        }
    }

}
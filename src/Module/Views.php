<?php

/*
 * This file is part of Pluf Framework, a simple PHP Application Framework.
 * Copyright (C) 2010-2020 Phoinex Scholars Co. (http://dpq.co.ir)
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program. If not, see <http://www.gnu.org/licenses/>.
 */
class Module_Views
{

    /**
     *
     * @param Pluf_HTTP_Request $request            
     * @param array $match            
     */
    public function install ($request, $match)
    {
        // TODO: set from index file path
        $composer = new Module_ComposerAPI(__DIR__ . '/../../');
        $composer->set_path_to_composer_home(__DIR__ . '/../../');
        
        $packages = $request->REQUEST['packages'];
        if (! is_array($packages)) {
            $packages = array(
                    $request->REQUEST['packages']
            );
        }
        
        // install package
        $moduls = array();
        foreach ($packages as $package) {
            $moduls[] = 'pluf/' . strtolower($package);
        }
        $composer->requirePackage($moduls);
        
        // install pluf module
        $mig = new Pluf_Migration($packages);
        $mig->install();
        
        
        foreach ($packages as $package){
            $cnf = Pluf_Migration::getModuleConfig($package);
            $module = new Module_Description();
            $module->setFromFormData($cnf);
            $module->create();
        }
        
        $output = $composer->show();
        $stream = $output->getStream();
        rewind($stream);
        echo (stream_get_contents($stream));
    }

    /**
     *
     * @param Pluf_HTTP_Request $request            
     * @param array $match            
     */
    public function uninstall ()
    {}

    /**
     *
     * @param Pluf_HTTP_Request $request            
     * @param array $match            
     */
    public function update ()
    {}
}

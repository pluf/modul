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

/**
 * Installed module descriptions
 */
class Module_Description extends Pluf_Model
{

    /**
     * The init method is used to define your model.
     */
    function init ()
    {
        $this->_a['table'] = 'moduls';
        $this->_a['verbose'] = 'user';
        $this->_a['multitenant'] = false;
        $this->_a['cols'] = array(
                'id' => array(
                        'type' => 'Pluf_DB_Field_Sequence',
                        'blank' => true,
                        'editable' => false
                ),
                'name' => array(
                        'type' => 'Pluf_DB_Field_Varchar',
                        'blank' => true,
                        'size' => 250,
                        'verbose' => 'module name',
                        'editable' => false,
                        'readable' => true
                ),
                'title' => array(
                        'type' => 'Pluf_DB_Field_Varchar',
                        'blank' => true,
                        'size' => 250,
                        'verbose' => 'module title',
                        'editable' => false,
                        'readable' => true
                ),
                'description' => array(
                        'type' => 'Pluf_DB_Field_Varchar',
                        'blank' => true,
                        'size' => 250,
                        'verbose' => 'module description',
                        'editable' => false,
                        'readable' => true
                ),
                'version' => array(
                        'type' => 'Pluf_DB_Field_Varchar',
                        'blank' => true,
                        'size' => 250,
                        'verbose' => 'module version',
                        'editable' => false,
                        'readable' => true
                ),
                'home' => array(
                        'type' => 'Pluf_DB_Field_Varchar',
                        'blank' => true,
                        'size' => 250,
                        'verbose' => 'module home',
                        'editable' => false,
                        'readable' => true
                ),
        );
    }

    /**
     * String
     *
     * {@inheritdoc}
     *
     * @see Pluf_Model::__toString()
     */
    public function __toString ()
    {
        return $this->name . '-' . $this->version;
    }
}
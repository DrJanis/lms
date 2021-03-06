<?php

/*
 * LMS version 1.11-git
 *
 *  (C) Copyright 2001-2014 LMS Developers
 *
 *  This program is free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License Version 2 as
 *  published by the Free Software Foundation.
 *
 *  This program is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  You should have received a copy of the GNU General Public License
 *  along with this program; if not, write to the Free Software
 *  Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA 02111-1307,
 *  USA.
 *
 */

$DB->BeginTrans();

$DB->Execute("
ALTER TABLE rtqueues ADD COLUMN newticketsubject varchar(255) NOT NULL DEFAULT '';
ALTER TABLE rtqueues ADD COLUMN newticketbody text NOT NULL DEFAULT '';
ALTER TABLE rtqueues ADD COLUMN newmessagesubject varchar(255) NOT NULL DEFAULT '';
ALTER TABLE rtqueues ADD COLUMN newmessagebody text NOT NULL DEFAULT '';
ALTER TABLE rtqueues ADD COLUMN resolveticketsubject varchar(255) NOT NULL DEFAULT '';
ALTER TABLE rtqueues ADD COLUMN resolveticketbody text NOT NULL DEFAULT '';
");

$DB->Execute("UPDATE dbinfo SET keyvalue = ? WHERE keytype = ?", array('2014020400', 'dbversion'));

$DB->CommitTrans();

?>

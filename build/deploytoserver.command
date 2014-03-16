#!/bin/bash

src="src"
repository=`cd ../$src; pwd`
pathtojoomla="/Applications/MAMP/htdocs/joomla32"

ditto -V "$repository/site" "$pathtojoomla/components/com_vaudevillian"

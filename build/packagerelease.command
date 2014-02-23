#!/bin/bash

mkdir -p _output

src="src"
build=`pwd`"/_output"
repository=`cd ../$src; pwd`

projectName="com_vaudevillian"

cd "$repository"
cd ..

zip -vr "$projectName.zip" "$src/" -x "*.DS_Store"

mv "$projectName"".zip" "$build/$projectName""-release.zip"

exit
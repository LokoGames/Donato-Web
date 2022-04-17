git pull
git add .

$opt = Read-Host -prompt "Do you want to personalize the commit message[Y|N]?"



if($opt -like "[y|Y]"){
    $dt = Read-Host -prompt "Commit message :> "
}elseif($opt -like "[n|N]"){
    $dt = Get-Date
    $dt = $dt -replace "`n",", " -replace "`r",", "
}else {
    echo "Invalid input!"
}

echo "Comminting with message #> $dt" 

git commit -m $dt
git push -u origin master

pause
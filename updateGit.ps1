git pull
git add .
$dt = Get-Date
$dt = $dt -replace "`n",", " -replace "`r",", "
echo "Comminting with date #> $dt" 
git commit -m $dt
git push -u origin master
# ==================================================================
# ACI Marine - cPanel deploy zip banay
# Chalate: deploy-zip.bat double-click korun
# Output : ../aci_marine_deploy.zip (project folder er pashe)
# ==================================================================

$ErrorActionPreference = 'Stop'

$src   = $PSScriptRoot
$stage = Join-Path $env:TEMP 'aci_marine_deploy_stage'
$zip   = Join-Path (Split-Path $src -Parent) 'aci_marine_deploy.zip'

Write-Host 'File copy hocche (node_modules, .git, tests, .env bad)...'
if (Test-Path $stage) { Remove-Item $stage -Recurse -Force }

# /XJ: public\storage junction bad (cPanel e symlink lage na)
# .env / .env.production zip e jay na — server er nijer .env overwrite hoy na,
# ar local credential zip e leak kore na
robocopy $src $stage /E /XJ /XD node_modules .git tests /XF *.zip *.ps1 *.bat .phpunit.result.cache .env .env.production /NFL /NDL /NJH /NJS | Out-Null
if ($LASTEXITCODE -ge 8) { throw "File copy fail hoyeche (robocopy exit code: $LASTEXITCODE)" }

# Local er compiled view, cache, session, log bad — server e abar toiri hobe
foreach ($dir in @('storage\framework\views', 'storage\framework\sessions', 'storage\framework\cache\data', 'storage\logs')) {
    $full = Join-Path $stage $dir
    if (Test-Path $full) {
        Get-ChildItem $full -Recurse -File | Where-Object Name -ne '.gitignore' | Remove-Item -Force
    }
}

Write-Host 'Zip toiri hocche...'
if (Test-Path $zip) { Remove-Item $zip -Force }

# tar diye zip banai — .NET/Compress-Archive er zip e path separator
# backslash (\) hoy, ja Linux/cPanel e extract korle structure venge jay
$items = (Get-ChildItem $stage -Force).Name
tar -a -cf $zip -C $stage @items
if ($LASTEXITCODE -ne 0) { throw "Zip banate somossa hoyeche (tar exit code: $LASTEXITCODE)" }

Remove-Item $stage -Recurse -Force

$sizeMB = [math]::Round((Get-Item $zip).Length / 1MB, 1)
Write-Host ''
Write-Host "DONE! Zip toiri ($sizeMB MB):" -ForegroundColor Green
Write-Host "  $zip"
Write-Host ''
Write-Host 'Ekhon: cPanel File Manager > public_html > Upload > Extract. Bas!'
Write-Host ''
Write-Host 'Note: zip e kono .env jay na — server er configured .env safe thakbe.'
Write-Host 'Prothom bar deploy korle server e .env.example copy kore ".env" baniye DB/APP_URL bosan.'

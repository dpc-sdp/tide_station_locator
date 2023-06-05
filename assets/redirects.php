<?php

/**
 * @file
 * File has all the redirects mentioned.
 */

/**
 * Helper method to get all the redirects.
 *
 * @return array
 *   Redirects array.
 */
function _tide_station_locator_redirects() {
  $content_vicpol = [
    'https://www.police.vic.gov.au/location/?q=alexandra' => 'https://www.police.vic.gov.au/alexandra-police-station',
    'https://www.police.vic.gov.au/location/?q=altona' => 'https://www.police.vic.gov.au/altona-police-station',
    'https://www.police.vic.gov.au/location/?q=angelsea' => 'https://www.police.vic.gov.au/anglesea-police-station',
    'https://www.police.vic.gov.au/location/?q=apollo-bay' => 'https://www.police.vic.gov.au/apollo-bay-police-station',
    'https://www.police.vic.gov.au/location/?q=apsley' => 'https://www.police.vic.gov.au/apsley-police-station',
    'https://www.police.vic.gov.au/location/?q=ararat' => 'https://www.police.vic.gov.au/ararat-police-station',
    'https://www.police.vic.gov.au/location/?q=avoca' => 'https://www.police.vic.gov.au/avoca-police-station',
    'https://www.police.vic.gov.au/location/?q=avondale-heights' => 'https://www.police.vic.gov.au/avondale-heights-police-station',
    'https://www.police.vic.gov.au/location/?q=axedale' => 'https://www.police.vic.gov.au/axedale-police-station',
    'https://www.police.vic.gov.au/location/?q=bacchus-marsh' => 'https://www.police.vic.gov.au/bacchus-marsh-police-station',
    'https://www.police.vic.gov.au/location/?q=bairnsdale' => 'https://www.police.vic.gov.au/bairnsdale-police-station',
    'https://www.police.vic.gov.au/location/?q=ballan' => 'https://www.police.vic.gov.au/ballan-police-station',
    'https://www.police.vic.gov.au/location/?q=ballarat' => 'https://www.police.vic.gov.au/ballarat-police-station',
    'https://www.police.vic.gov.au/location/?q=winter-valley' => 'https://www.police.vic.gov.au/ballarat-west-police-complex-location',
    'https://www.police.vic.gov.au/location/?q=balmoral' => 'https://www.police.vic.gov.au/balmoral-police-station',
    'https://www.police.vic.gov.au/location/?q=bannockburn' => 'https://www.police.vic.gov.au/bannockburn-police-station',
    'https://www.police.vic.gov.au/location/?q=bayside' => 'https://www.police.vic.gov.au/bayside-police-station',
    'https://www.police.vic.gov.au/location/?q=beaufort' => 'https://www.police.vic.gov.au/beaufort-police-station',
    'https://www.police.vic.gov.au/location/?q=beeac' => 'https://www.police.vic.gov.au/beeac-police-station',
    'https://www.police.vic.gov.au/location/?q=beechworth' => 'https://www.police.vic.gov.au/beechworth-police-station',
    'https://www.police.vic.gov.au/location/?q=belgrave' => 'https://www.police.vic.gov.au/belgrave-police-station',
    'https://www.police.vic.gov.au/location/?q=bellarine' => 'https://www.police.vic.gov.au/bellarine-police-station',
    'https://www.police.vic.gov.au/location/?q=benalla' => 'https://www.police.vic.gov.au/benalla-police-station',
    'https://www.police.vic.gov.au/location/?q=bendigo' => 'https://www.police.vic.gov.au/bendigo-police-station',
    'https://www.police.vic.gov.au/location/?q=bendoc' => 'https://www.police.vic.gov.au/bendoc-police-station',
    'https://www.police.vic.gov.au/location/?q=bethanga' => 'https://www.police.vic.gov.au/bethanga-police-station',
    'https://www.police.vic.gov.au/location/?q=beulah' => 'https://www.police.vic.gov.au/beulah-police-station',
    'https://www.police.vic.gov.au/location/?q=birchip' => 'https://www.police.vic.gov.au/birchip-police-station',
    'https://www.police.vic.gov.au/location/?q=birregurra' => 'https://www.police.vic.gov.au/birregurra-police-station',
    'https://www.police.vic.gov.au/location/?q=boolarra' => 'https://www.police.vic.gov.au/boolarra-police-station',
    'https://www.police.vic.gov.au/location/?q=boort' => 'https://www.police.vic.gov.au/boort-police-station',
    'https://www.police.vic.gov.au/location/?q=boronia' => 'https://www.police.vic.gov.au/boronia-police-station',
    'https://www.police.vic.gov.au/location/?q=boroondara' => 'https://www.police.vic.gov.au/boroondara-police-station',
    'https://www.police.vic.gov.au/location/?q=box-hill' => 'https://www.police.vic.gov.au/box-hill-police-station',
    'https://www.police.vic.gov.au/location/?q=branxholme' => 'https://www.police.vic.gov.au/branxholme-police-station',
    'https://www.police.vic.gov.au/location/?q=briagolong' => 'https://www.police.vic.gov.au/briagolong-police-station',
    'https://www.police.vic.gov.au/location/?q=bridgewater' => 'https://www.police.vic.gov.au/bridgewater-police-station',
    'https://www.police.vic.gov.au/location/?q=bright' => 'https://www.police.vic.gov.au/bright-police-station',
    'https://www.police.vic.gov.au/location/?q=broadford' => 'https://www.police.vic.gov.au/broadford-police-station',
    'https://www.police.vic.gov.au/location/?q=broadmeadows' => 'https://www.police.vic.gov.au/broadmeadows-police-station',
    'https://www.police.vic.gov.au/location/?q=brunswick' => 'https://www.police.vic.gov.au/brunswick-police-station',
    'https://www.police.vic.gov.au/location/?q=bruthen' => 'https://www.police.vic.gov.au/bruthen-police-station',
    'https://www.police.vic.gov.au/location/?q=buchan' => 'https://www.police.vic.gov.au/buchan-police-station',
    'https://www.police.vic.gov.au/location/?q=buninyong' => 'https://www.police.vic.gov.au/buninyong-police-station',
    'https://www.police.vic.gov.au/location/?q=bunyip' => 'https://www.police.vic.gov.au/bunyip-police-station',
    'https://www.police.vic.gov.au/location/?q=camberwell' => 'https://www.police.vic.gov.au/camberwell-police-station',
    'https://www.police.vic.gov.au/location/?q=camperdown' => 'https://www.police.vic.gov.au/camperdown-police-station',
    'https://www.police.vic.gov.au/location/?q=cann-river' => 'https://www.police.vic.gov.au/cann-river-police-station',
    'https://www.police.vic.gov.au/location/?q=caroline-springs' => 'https://www.police.vic.gov.au/caroline-springs-police-station',
    'https://www.police.vic.gov.au/location/?q=carrum-downs' => 'https://www.police.vic.gov.au/carrum-downs-police-station',
    'https://www.police.vic.gov.au/location/?q=casterton' => 'https://www.police.vic.gov.au/casterton-police-station',
    'https://www.police.vic.gov.au/location/?q=castlemaine' => 'https://www.police.vic.gov.au/castlemaine-police-station',
    'https://www.police.vic.gov.au/location/?q=caulfield' => 'https://www.police.vic.gov.au/caulfield-police-station',
    'https://www.police.vic.gov.au/location/?q=cavendish' => 'https://www.police.vic.gov.au/cavendish-police-station',
    'https://www.police.vic.gov.au/location/?q=charlton' => 'https://www.police.vic.gov.au/charlton-police-station',
    'https://www.police.vic.gov.au/location/?q=chelsea' => 'https://www.police.vic.gov.au/chelsea-police-station',
    'https://www.police.vic.gov.au/location/?q=cheltenham' => 'https://www.police.vic.gov.au/cheltenham-police-station',
    'https://www.police.vic.gov.au/location/?q=chiltern' => 'https://www.police.vic.gov.au/chiltern-police-station',
    'https://www.police.vic.gov.au/location/?q=churchill' => 'https://www.police.vic.gov.au/churchill-police-station',
    'https://www.police.vic.gov.au/location/?q=clayton' => 'https://www.police.vic.gov.au/clayton-police-station',
    'https://www.police.vic.gov.au/location/?q=clunes' => 'https://www.police.vic.gov.au/clunes-police-station',
    'https://www.police.vic.gov.au/location/?q=cobden' => 'https://www.police.vic.gov.au/cobden-police-station',
    'https://www.police.vic.gov.au/location/?q=cobram' => 'https://www.police.vic.gov.au/cobram-police-station',
    'https://www.police.vic.gov.au/location/?q=cohuna' => 'https://www.police.vic.gov.au/cohuna-police-station',
    'https://www.police.vic.gov.au/location/?q=colac' => 'https://www.police.vic.gov.au/colac-police-station',
    'https://www.police.vic.gov.au/location/?q=coleraine' => 'https://www.police.vic.gov.au/coleraine-police-station',
    'https://www.police.vic.gov.au/location/?q=abbotsford' => 'https://www.police.vic.gov.au/collingwood-police-station',
    'https://www.police.vic.gov.au/location/?q=corio' => 'https://www.police.vic.gov.au/corio-police-station',
    'https://www.police.vic.gov.au/location/?q=corryong' => 'https://www.police.vic.gov.au/corryong-police-station',
    'https://www.police.vic.gov.au/location/?q=cowes' => 'https://www.police.vic.gov.au/cowes-police-station',
    'https://www.police.vic.gov.au/location/?q=craigieburn' => 'https://www.police.vic.gov.au/craigieburn-police-station',
    'https://www.police.vic.gov.au/location/?q=cranbourne' => 'https://www.police.vic.gov.au/cranbourne-police-station',
    'https://www.police.vic.gov.au/location/?q=creswick' => 'https://www.police.vic.gov.au/creswick-police-station',
    'https://www.police.vic.gov.au/location/?q=croydon' => 'https://www.police.vic.gov.au/croydon-police-station',
    'https://www.police.vic.gov.au/location/?q=culgoa' => 'https://www.police.vic.gov.au/culgoa-police-station',
    'https://www.police.vic.gov.au/location/?q=dandenong' => 'https://www.police.vic.gov.au/dandenong-police-station',
    'https://www.police.vic.gov.au/location/?q=dartmoor' => 'https://www.police.vic.gov.au/dartmoor-police-station',
    'https://www.police.vic.gov.au/location/?q=daylesford' => 'https://www.police.vic.gov.au/daylesford-police-station',
    'https://www.police.vic.gov.au/location/?q=dederang' => 'https://www.police.vic.gov.au/dederang-police-station',
    'https://www.police.vic.gov.au/location/?q=diamond-creek' => 'https://www.police.vic.gov.au/diamond-creek-police-station',
    'https://www.police.vic.gov.au/location/?q=dimboola' => 'https://www.police.vic.gov.au/dimboola-police-station',
    'https://www.police.vic.gov.au/location/?q=donald' => 'https://www.police.vic.gov.au/donald-police-station',
    'https://www.police.vic.gov.au/location/?q=doncaster-east' => 'https://www.police.vic.gov.au/doncaster-police-station',
    'https://www.police.vic.gov.au/location/?q=dookie' => 'https://www.police.vic.gov.au/dookie-police-station',
    'https://www.police.vic.gov.au/location/?q=dromana' => 'https://www.police.vic.gov.au/dromana-police-station',
    'https://www.police.vic.gov.au/location/?q=drouin' => 'https://www.police.vic.gov.au/drouin-police-station',
    'https://www.police.vic.gov.au/location/?q=drysdale' => 'https://www.police.vic.gov.au/drysdale-police-station',
    'https://www.police.vic.gov.au/location/?q=dunkeld' => 'https://www.police.vic.gov.au/dunkeld-police-station',
    'https://www.police.vic.gov.au/location/?q=dunolly' => 'https://www.police.vic.gov.au/dunolly-police-station',
    'https://www.police.vic.gov.au/location/?q=eaglehawk' => 'https://www.police.vic.gov.au/eaglehawk-police-station',
    'https://www.police.vic.gov.au/location/?q=echuca' => 'https://www.police.vic.gov.au/echuca-police-station',
    'https://www.police.vic.gov.au/location/?q=edenhope' => 'https://www.police.vic.gov.au/edenhope-police-station',
    'https://www.police.vic.gov.au/location/?q=eildon' => 'https://www.police.vic.gov.au/eildon-police-station',
    'https://www.police.vic.gov.au/location/?q=elmhurst' => 'https://www.police.vic.gov.au/elmhurst-police-station',
    'https://www.police.vic.gov.au/location/?q=elmore' => 'https://www.police.vic.gov.au/elmore-police-station',
    'https://www.police.vic.gov.au/location/?q=eltham' => 'https://www.police.vic.gov.au/eltham-police-station',
    'https://www.police.vic.gov.au/location/?q=emerald' => 'https://www.police.vic.gov.au/emerald-police-station',
    'https://www.police.vic.gov.au/location/?q=endeavour-hills' => 'https://www.police.vic.gov.au/endeavour-hills-police-station',
    'https://www.police.vic.gov.au/location/?q=epping' => 'https://www.police.vic.gov.au/epping-police-station',
    'https://www.police.vic.gov.au/location/?q=euroa' => 'https://www.police.vic.gov.au/euroa-police-station',
    'https://www.police.vic.gov.au/location/?q=falls-creek' => 'https://www.police.vic.gov.au/falls-creek-police-station',
    'https://www.police.vic.gov.au/location/?q=hadfield' => 'https://www.police.vic.gov.au/fawkner-police-station',
    'https://www.police.vic.gov.au/location/?q=fitzroy' => 'https://www.police.vic.gov.au/fitzroy-police-station',
    'https://www.police.vic.gov.au/location/?q=flemington' => 'https://www.police.vic.gov.au/flemington-police-station',
    'https://www.police.vic.gov.au/location/?q=footscray' => 'https://www.police.vic.gov.au/footscray-police-station',
    'https://www.police.vic.gov.au/location/?q=vermont south' => 'https://www.police.vic.gov.au/forest-hill-police-station',
    'https://www.police.vic.gov.au/location/?q=forrest' => 'https://www.police.vic.gov.au/forrest-police-station',
    'https://www.police.vic.gov.au/location/?q=foster' => 'https://www.police.vic.gov.au/foster-police-station',
    'https://www.police.vic.gov.au/location/?q=frankston' => 'https://www.police.vic.gov.au/frankston-police-station',
    'https://www.police.vic.gov.au/location/?q=geelong' => 'https://www.police.vic.gov.au/geelong-police-station',
    'https://www.police.vic.gov.au/location/?q=gisborne' => 'https://www.police.vic.gov.au/gisborne-police-station',
    'https://www.police.vic.gov.au/location/?q=glen-waverley' => 'https://www.police.vic.gov.au/glen-waverley-police-station',
    'https://www.police.vic.gov.au/location/?q=glenrowan' => 'https://www.police.vic.gov.au/glenrowan-police-station',
    'https://www.police.vic.gov.au/location/?q=goornong' => 'https://www.police.vic.gov.au/goornong-police-station',
    'https://www.police.vic.gov.au/location/?q=gordon' => 'https://www.police.vic.gov.au/gordon-police-station',
    'https://www.police.vic.gov.au/location/?q=goroke' => 'https://www.police.vic.gov.au/goroke-police-station',
    'https://www.police.vic.gov.au/location/?q=greensborough' => 'https://www.police.vic.gov.au/greensborough-police-station',
    'https://www.police.vic.gov.au/location/?q=gunbower' => 'https://www.police.vic.gov.au/gunbower-police-station',
    'https://www.police.vic.gov.au/location/?q=halls-gap' => 'https://www.police.vic.gov.au/halls-gap-police-station',
    'https://www.police.vic.gov.au/location/?q=hamilton' => 'https://www.police.vic.gov.au/hamilton-police-station',
    'https://www.police.vic.gov.au/location/?q=harrow' => 'https://www.police.vic.gov.au/harrow-police-station',
    'https://www.police.vic.gov.au/location/?q=hastings' => 'https://www.police.vic.gov.au/hastings-police-station',
    'https://www.police.vic.gov.au/location/?q=healesville' => 'https://www.police.vic.gov.au/healesville-police-station',
    'https://www.police.vic.gov.au/location/?q=heathcote' => 'https://www.police.vic.gov.au/heathcote-police-station',
    'https://www.police.vic.gov.au/location/?q=heidelberg' => 'https://www.police.vic.gov.au/heidelberg-police-station',
    'https://www.police.vic.gov.au/location/?q=heyfield' => 'https://www.police.vic.gov.au/heyfield-police-station',
    'https://www.police.vic.gov.au/location/?q=heywood' => 'https://www.police.vic.gov.au/heywood-police-station',
    'https://www.police.vic.gov.au/location/?q=hopetoun' => 'https://www.police.vic.gov.au/hopetoun-police-station',
    'https://www.police.vic.gov.au/location/?q=horsham' => 'https://www.police.vic.gov.au/horsham-police-station',
    'https://www.police.vic.gov.au/location/?q=hurstbridge' => 'https://www.police.vic.gov.au/hurstbridge-police-station',
    'https://www.police.vic.gov.au/location/?q=inglewood' => 'https://www.police.vic.gov.au/inglewood-police-station',
    'https://www.police.vic.gov.au/location/?q=inverleigh' => 'https://www.police.vic.gov.au/inverleigh-police-station',
    'https://www.police.vic.gov.au/location/?q=inverloch' => 'https://www.police.vic.gov.au/inverloch-police-station',
    'https://www.police.vic.gov.au/location/?q=jamieson' => 'https://www.police.vic.gov.au/jamieson-police-station',
    'https://www.police.vic.gov.au/location/?q=jeparit' => 'https://www.police.vic.gov.au/jeparit-police-station',
    'https://www.police.vic.gov.au/location/?q=kaniva' => 'https://www.police.vic.gov.au/kaniva-police-station',
    'https://www.police.vic.gov.au/location/?q=katamatite' => 'https://www.police.vic.gov.au/katamatite-police-station',
    'https://www.police.vic.gov.au/location/?q=keilor-downs' => 'https://www.police.vic.gov.au/keilor-downs-police-station',
    'https://www.police.vic.gov.au/location/?q=kerang' => 'https://www.police.vic.gov.au/kerang-police-station',
    'https://www.police.vic.gov.au/location/?q=kilmore' => 'https://www.police.vic.gov.au/kilmore-police-station',
    'https://www.police.vic.gov.au/location/?q=kinglake' => 'https://www.police.vic.gov.au/kinglake-police-station',
    'https://www.police.vic.gov.au/location/?q=wantirna-south' => 'https://www.police.vic.gov.au/knox-police-station',
    'https://www.police.vic.gov.au/location/?q=koondrook' => 'https://www.police.vic.gov.au/koondrook-police-station',
    'https://www.police.vic.gov.au/location/?q=koo-wee-rup' => 'https://www.police.vic.gov.au/koo-wee-rup-police-station',
    'https://www.police.vic.gov.au/location/?q=koroit' => 'https://www.police.vic.gov.au/koroit-police-station',
    'https://www.police.vic.gov.au/location/?q=korumburra' => 'https://www.police.vic.gov.au/korumburra-police-station',
    'https://www.police.vic.gov.au/location/?q=kyabram' => 'https://www.police.vic.gov.au/kyabram-police-station',
    'https://www.police.vic.gov.au/location/?q=kyneton' => 'https://www.police.vic.gov.au/kyneton-police-station',
    'https://www.police.vic.gov.au/location/?q=lake-boga' => 'https://www.police.vic.gov.au/lake-boga-police-station',
    'https://www.police.vic.gov.au/location/?q=lake-bolac' => 'https://www.police.vic.gov.au/lake-bolac-police-station',
    'https://www.police.vic.gov.au/location/?q=lakes-entrance' => 'https://www.police.vic.gov.au/lakes-entrance-police-station',
    'https://www.police.vic.gov.au/location/?q=lancefield' => 'https://www.police.vic.gov.au/lancefield-police-station',
    'https://www.police.vic.gov.au/location/?q=landsborough' => 'https://www.police.vic.gov.au/landsborough-police-station',
    'https://www.police.vic.gov.au/location/?q=lara' => 'https://www.police.vic.gov.au/lara-police-station',
    'https://www.police.vic.gov.au/location/?q=lavers-hill' => 'https://www.police.vic.gov.au/lavers-hill-police-station',
    'https://www.police.vic.gov.au/location/?q=learmonth' => 'https://www.police.vic.gov.au/learmonth-police-station',
    'https://www.police.vic.gov.au/location/?q=leongatha' => 'https://www.police.vic.gov.au/leongatha-police-station',
    'https://www.police.vic.gov.au/location/?q=lexton' => 'https://www.police.vic.gov.au/lexton-police-station',
    'https://www.police.vic.gov.au/location/?q=lilydale' => 'https://www.police.vic.gov.au/lilydale-police-station',
    'https://www.police.vic.gov.au/location/?q=linton' => 'https://www.police.vic.gov.au/linton-police-station',
    'https://www.police.vic.gov.au/location/?q=lismore' => 'https://www.police.vic.gov.au/lismore-police-station',
    'https://www.police.vic.gov.au/location/?q=loch' => 'https://www.police.vic.gov.au/loch-police-station',
    'https://www.police.vic.gov.au/location/?q=loch-sport' => 'https://www.police.vic.gov.au/loch-sport-police-station',
    'https://www.police.vic.gov.au/location/?q=lorne' => 'https://www.police.vic.gov.au/lorne-police-station',
    'https://www.police.vic.gov.au/location/?q=macarthur' => 'https://www.police.vic.gov.au/macarthur-police-station',
    'https://www.police.vic.gov.au/location/?q=macedon' => 'https://www.police.vic.gov.au/macedon-police-station',
    'https://www.police.vic.gov.au/location/?q=maffra' => 'https://www.police.vic.gov.au/maffra-police-station',
    'https://www.police.vic.gov.au/location/?q=maldon' => 'https://www.police.vic.gov.au/maldon-police-station',
    'https://www.police.vic.gov.au/location/?q=mallacoota' => 'https://www.police.vic.gov.au/mallacoota-police-station',
    'https://www.police.vic.gov.au/location/?q=malmsbury' => 'https://www.police.vic.gov.au/malmsbury-police-station',
    'https://www.police.vic.gov.au/location/?q=manangatang' => 'https://www.police.vic.gov.au/manangatang-police-station',
    'https://www.police.vic.gov.au/location/?q=mansfield' => 'https://www.police.vic.gov.au/mansfield-police-station',
    'https://www.police.vic.gov.au/location/?q=maryborough' => 'https://www.police.vic.gov.au/maryborough-police-station',
    'https://www.police.vic.gov.au/location/?q=marysville' => 'https://www.police.vic.gov.au/marysville-police-station',
    'https://www.police.vic.gov.au/location/?q=meeniyan' => 'https://www.police.vic.gov.au/meeniyan-police-station',
    'https://www.police.vic.gov.au/location/?q=melbourne' => 'https://www.police.vic.gov.au/melbourne-east-police-station',
    'https://www.police.vic.gov.au/location/?q=north-melbourne' => 'https://www.police.vic.gov.au/melbourne-north-police-station',
    //'https://www.police.vic.gov.au/location/?q=melbourne' => 'https://www.police.vic.gov.au/melbourne-prosecutions-unit',
    //'https://www.police.vic.gov.au/location/?q=melbourne' => 'https://www.police.vic.gov.au/melbourne-childrens-court-prosecutions-unit',
    //'https://www.police.vic.gov.au/location/?q=melbourne' => 'https://www.police.vic.gov.au/melbourne-west-police-station',
    'https://www.police.vic.gov.au/location/?q=melton' => 'https://www.police.vic.gov.au/melton-police-station',
    'https://www.police.vic.gov.au/location/?q=merbein' => 'https://www.police.vic.gov.au/merbein-police-station',
    'https://www.police.vic.gov.au/location/?q=meredith' => 'https://www.police.vic.gov.au/meredith-police-station',
    'https://www.police.vic.gov.au/location/?q=merino' => 'https://www.police.vic.gov.au/merino-police-station',
    'https://www.police.vic.gov.au/location/?q=mernda' => 'https://www.police.vic.gov.au/mernda-police-station',
    'https://www.police.vic.gov.au/location/?q=mildura' => 'https://www.police.vic.gov.au/mildura-police-station',
    'https://www.police.vic.gov.au/location/?q=mill-park' => 'https://www.police.vic.gov.au/mill-park-police-station',
    'https://www.police.vic.gov.au/location/?q=minyip' => 'https://www.police.vic.gov.au/minyip-police-station',
    'https://www.police.vic.gov.au/location/?q=mirboo-north' => 'https://www.police.vic.gov.au/mirboo-north-police-station',
    'https://www.police.vic.gov.au/location/?q=mitta-mitta' => 'https://www.police.vic.gov.au/mitta-mitta-police-station',
    'https://www.police.vic.gov.au/location/?q=moe' => 'https://www.police.vic.gov.au/moe-police-station',
    'https://www.police.vic.gov.au/location/?q=monbulk' => 'https://www.police.vic.gov.au/monbulk-police-station',
    'https://www.police.vic.gov.au/location/?q=moonee-ponds' => 'https://www.police.vic.gov.au/moonee-ponds-police-station',
    'https://www.police.vic.gov.au/location/?q=moorabbin' => 'https://www.police.vic.gov.au/moorabbin-police-station',
    'https://www.police.vic.gov.au/location/?q=moorabbin-prosecution' => 'https://www.police.vic.gov.au/moorabbin-prosecutions-unit',
    'https://www.police.vic.gov.au/location/?q=mooroolbark' => 'https://www.police.vic.gov.au/mooroolbark-police-station',
    'https://www.police.vic.gov.au/location/?q=mooroopna' => 'https://www.police.vic.gov.au/mooroopna-police-station',
    'https://www.police.vic.gov.au/location/?q=mordialloc' => 'https://www.police.vic.gov.au/mordialloc-police-station',
    'https://www.police.vic.gov.au/location/?q=malvern' => 'https://www.police.vic.gov.au/malvern-police-station',
    'https://www.police.vic.gov.au/location/?q=mornington' => 'https://www.police.vic.gov.au/mornington-police-station',
    'https://www.police.vic.gov.au/location/?q=mortlake' => 'https://www.police.vic.gov.au/mortlake-police-station',
    'https://www.police.vic.gov.au/location/?q=morwell' => 'https://www.police.vic.gov.au/morwell-police-station',
    'https://www.police.vic.gov.au/location/?q=mount-beauty' => 'https://www.police.vic.gov.au/mount-beauty-police-station',
    'https://www.police.vic.gov.au/location/?q=mount-buller' => 'https://www.police.vic.gov.au/mount-buller-police-station',
    'https://www.police.vic.gov.au/location/?q=mount-evelyn' => 'https://www.police.vic.gov.au/mount-evelyn-police-station',
    'https://www.police.vic.gov.au/location/?q=hotham-heights' => 'https://www.police.vic.gov.au/mount-hotham-police-station',
    'https://www.police.vic.gov.au/location/?q=mount-waverley' => 'https://www.police.vic.gov.au/mount-waverley-police-station',
    'https://www.police.vic.gov.au/location/?q=moyhu' => 'https://www.police.vic.gov.au/moyhu-police-station',
    'https://www.police.vic.gov.au/location/?q=murchison' => 'https://www.police.vic.gov.au/murchison-police-station',
    'https://www.police.vic.gov.au/location/?q=murrayville' => 'https://www.police.vic.gov.au/murrayville-police-station',
    'https://www.police.vic.gov.au/location/?q=murtoa' => 'https://www.police.vic.gov.au/murtoa-police-station',
    'https://www.police.vic.gov.au/location/?q=myrtleford' => 'https://www.police.vic.gov.au/myrtleford-police-station',
    'https://www.police.vic.gov.au/location/?q=nagambie' => 'https://www.police.vic.gov.au/nagambie-police-station',
    'https://www.police.vic.gov.au/location/?q=narre-warren' => 'https://www.police.vic.gov.au/narre-warren-police-station',
    'https://www.police.vic.gov.au/location/?q=nathalia' => 'https://www.police.vic.gov.au/nathalia-police-station',
    'https://www.police.vic.gov.au/location/?q=natimuk' => 'https://www.police.vic.gov.au/natimuk-police-station',
    'https://www.police.vic.gov.au/location/?q=neerim-south' => 'https://www.police.vic.gov.au/neerim-south-police-station',
    'https://www.police.vic.gov.au/location/?q=newstead' => 'https://www.police.vic.gov.au/newstead-police-station',
    'https://www.police.vic.gov.au/location/?q=nhill' => 'https://www.police.vic.gov.au/nhill-police-station',
    'https://www.police.vic.gov.au/location/?q=invermay-park' => 'https://www.police.vic.gov.au/north-ballarat-police-station',
    'https://www.police.vic.gov.au/location/?q=northcote' => 'https://www.police.vic.gov.au/northcote-police-station',
    'https://www.police.vic.gov.au/location/?q=numurkah' => 'https://www.police.vic.gov.au/numurkah-police-station',
    'https://www.police.vic.gov.au/location/?q=nunawading' => 'https://www.police.vic.gov.au/nunawading-police-station',
    'https://www.police.vic.gov.au/location/?q=nyah' => 'https://www.police.vic.gov.au/nyah-police-station',
    'https://www.police.vic.gov.au/location/?q=oakleigh' => 'https://www.police.vic.gov.au/oakleigh-police-station',
    'https://www.police.vic.gov.au/location/?q=olinda' => 'https://www.police.vic.gov.au/olinda-police-station',
    'https://www.police.vic.gov.au/location/?q=omeo' => 'https://www.police.vic.gov.au/omeo-police-station',
    'https://www.police.vic.gov.au/location/?q=orbost' => 'https://www.police.vic.gov.au/orbost-police-station',
    'https://www.police.vic.gov.au/location/?q=ouyen' => 'https://www.police.vic.gov.au/ouyen-police-station',
    'https://www.police.vic.gov.au/location/?q=pakenham' => 'https://www.police.vic.gov.au/pakenham-police-station',
    'https://www.police.vic.gov.au/location/?q=penshurst' => 'https://www.police.vic.gov.au/penshurst-police-station',
    'https://www.police.vic.gov.au/location/?q=port-campbell' => 'https://www.police.vic.gov.au/port-campbell-police-station',
    'https://www.police.vic.gov.au/location/?q=port-fairy' => 'https://www.police.vic.gov.au/port-fairy-police-station',
    'https://www.police.vic.gov.au/location/?q=portarlington' => 'https://www.police.vic.gov.au/portarlington-police-station',
    'https://www.police.vic.gov.au/location/?q=portland' => 'https://www.police.vic.gov.au/portland-police-station',
    'https://www.police.vic.gov.au/location/?q=prahran' => 'https://www.police.vic.gov.au/prahran-police-station',
    'https://www.police.vic.gov.au/location/?q=preston' => 'https://www.police.vic.gov.au/preston-police-station',
    'https://www.police.vic.gov.au/location/?q=prosecution-division-headquarters' => 'https://www.police.vic.gov.au/prosecutions-division-headquarters',
    'https://www.police.vic.gov.au/location/?q=prosecution-research-training' => 'https://www.police.vic.gov.au/prosecutions-research-training',
    'https://www.police.vic.gov.au/location/?q=pyalong' => 'https://www.police.vic.gov.au/pyalong-police-station',
    'https://www.police.vic.gov.au/location/?q=pyramid-hill' => 'https://www.police.vic.gov.au/pyramid-hill-police-station',
    'https://www.police.vic.gov.au/location/?q=quambatook' => 'https://www.police.vic.gov.au/quambatook-police-station',
    'https://www.police.vic.gov.au/location/?q=queenscliff' => 'https://www.police.vic.gov.au/queenscliff-police-station',
    'https://www.police.vic.gov.au/location/?q=rainbow' => 'https://www.police.vic.gov.au/rainbow-police-station',
    'https://www.police.vic.gov.au/location/?q=rawson' => 'https://www.police.vic.gov.au/rawson-police-station',
    'https://www.police.vic.gov.au/location/?q=raywood' => 'https://www.police.vic.gov.au/raywood-police-station',
    'https://www.police.vic.gov.au/location/?q=red-cliffs' => 'https://www.police.vic.gov.au/red-cliffs-police-station',
    'https://www.police.vic.gov.au/location/?q=reservoir' => 'https://www.police.vic.gov.au/reservoir-police-station',
    'https://www.police.vic.gov.au/location/?q=richmond' => 'https://www.police.vic.gov.au/richmond-police-station',
    'https://www.police.vic.gov.au/location/?q=riddells-creek' => 'https://www.police.vic.gov.au/riddells-creek-police-station',
    'https://www.police.vic.gov.au/location/?q=ringwood' => 'https://www.police.vic.gov.au/ringwood-police-station',
    'https://www.police.vic.gov.au/location/?q=robinvale' => 'https://www.police.vic.gov.au/robinvale-police-station',
    'https://www.police.vic.gov.au/location/?q=rochester' => 'https://www.police.vic.gov.au/rochester-police-station',
    'https://www.police.vic.gov.au/location/?q=rokewood' => 'https://www.police.vic.gov.au/rokewood-police-station',
    'https://www.police.vic.gov.au/location/?q=romsey' => 'https://www.police.vic.gov.au/romsey-police-station',
    'https://www.police.vic.gov.au/location/?q=rosebud' => 'https://www.police.vic.gov.au/rosebud-police-station',
    'https://www.police.vic.gov.au/location/?q=rosedale' => 'https://www.police.vic.gov.au/rosedale-police-station',
    'https://www.police.vic.gov.au/location/?q=rowville' => 'https://www.police.vic.gov.au/rowville-police-station',
    'https://www.police.vic.gov.au/location/?q=rupanyup' => 'https://www.police.vic.gov.au/rupanyup-police-station',
    'https://www.police.vic.gov.au/location/?q=rushworth' => 'https://www.police.vic.gov.au/rushworth-police-station',
    'https://www.police.vic.gov.au/location/?q=rutherglen' => 'https://www.police.vic.gov.au/rutherglen-police-station',
    'https://www.police.vic.gov.au/location/?q=rye' => 'https://www.police.vic.gov.au/rye-police-station',
    'https://www.police.vic.gov.au/location/?q=sale' => 'https://www.police.vic.gov.au/sale-police-station',
    'https://www.police.vic.gov.au/location/?q=san-remo' => 'https://www.police.vic.gov.au/san-remo-police-station',
    'https://www.police.vic.gov.au/location/?q=sea-lake' => 'https://www.police.vic.gov.au/sea-lake-police-station',
    'https://www.police.vic.gov.au/location/?q=serpentine' => 'https://www.police.vic.gov.au/serpentine-police-station',
    'https://www.police.vic.gov.au/location/?q=seymour' => 'https://www.police.vic.gov.au/seymour-police-station',
    'https://www.police.vic.gov.au/location/?q=shepparton' => 'https://www.police.vic.gov.au/shepparton-police-station',
    'https://www.police.vic.gov.au/location/?q=skipton' => 'https://www.police.vic.gov.au/skipton-police-station',
    'https://www.police.vic.gov.au/location/?q=smythesdale' => 'https://www.police.vic.gov.au/smythesdale-police-station',
    'https://www.police.vic.gov.au/location/?q=somerville' => 'https://www.police.vic.gov.au/somerville-police-station',
    'https://www.police.vic.gov.au/location/?q=sorrento' => 'https://www.police.vic.gov.au/sorrento-police-station',
    'https://www.police.vic.gov.au/location/?q=south-melbourne' => 'https://www.police.vic.gov.au/south-melbourne-police-station',
    'https://www.police.vic.gov.au/location/?q=southbank' => 'https://www.police.vic.gov.au/southbank-police-station',
    'https://www.police.vic.gov.au/location/?q=speed' => 'https://www.police.vic.gov.au/speed-police-station',
    'https://www.police.vic.gov.au/location/?q=springvale' => 'https://www.police.vic.gov.au/springvale-police-station',
    'https://www.police.vic.gov.au/location/?q=st-arnaud' => 'https://www.police.vic.gov.au/st-arnaud-police-station',
    'https://www.police.vic.gov.au/location/?q=st-kilda' => 'https://www.police.vic.gov.au/st-kilda-police-station',
    'https://www.police.vic.gov.au/location/?q=stanhope' => 'https://www.police.vic.gov.au/stanhope-police-station',
    'https://www.police.vic.gov.au/location/?q=stawell' => 'https://www.police.vic.gov.au/stawell-police-station',
    'https://www.police.vic.gov.au/location/?q=stratford' => 'https://www.police.vic.gov.au/stratford-police-station',
    'https://www.police.vic.gov.au/location/?q=sunbury' => 'https://www.police.vic.gov.au/sunbury-police-station',
    'https://www.police.vic.gov.au/location/?q=sunshine' => 'https://www.police.vic.gov.au/sunshine-police-station',
    'https://www.police.vic.gov.au/location/?q=swan-hill' => 'https://www.police.vic.gov.au/swan-hill-police-station',
    'https://www.police.vic.gov.au/location/?q=swifts-creek' => 'https://www.police.vic.gov.au/swifts-creek-police-station',
    'https://www.police.vic.gov.au/location/?q=tallangatta' => 'https://www.police.vic.gov.au/tallangatta-police-station',
    'https://www.police.vic.gov.au/location/?q=tangambalanga' => 'https://www.police.vic.gov.au/tangambalanga-police-station',
    'https://www.police.vic.gov.au/location/?q=tarnagulla' => 'https://www.police.vic.gov.au/tarnagulla-police-station',
    'https://www.police.vic.gov.au/location/?q=tatura' => 'https://www.police.vic.gov.au/tatura-police-station',
    'https://www.police.vic.gov.au/location/?q=terang' => 'https://www.police.vic.gov.au/terang-police-station',
    'https://www.police.vic.gov.au/location/?q=timboon' => 'https://www.police.vic.gov.au/timboon-police-station',
    'https://www.police.vic.gov.au/location/?q=tongala' => 'https://www.police.vic.gov.au/tongala-police-station',
    'https://www.police.vic.gov.au/location/?q=toora' => 'https://www.police.vic.gov.au/toora-police-station',
    'https://www.police.vic.gov.au/location/?q=torquay' => 'https://www.police.vic.gov.au/torquay-police-station',
    'https://www.police.vic.gov.au/location/?q=trafalgar' => 'https://www.police.vic.gov.au/trafalgar-police-station',
    'https://www.police.vic.gov.au/location/?q=traralgon' => 'https://www.police.vic.gov.au/traralgon-police-station',
    'https://www.police.vic.gov.au/location/?q=trentham' => 'https://www.police.vic.gov.au/trentham-police-station',
    'https://www.police.vic.gov.au/location/?q=tungamah' => 'https://www.police.vic.gov.au/tungamah-police-station',
    'https://www.police.vic.gov.au/location/?q=underbool' => 'https://www.police.vic.gov.au/underbool-police-station',
    'https://www.police.vic.gov.au/location/?q=victoria-police-centre' => 'https://www.police.vic.gov.au/victoria-police-centre',
    'https://www.police.vic.gov.au/location/?q=violet-town' => 'https://www.police.vic.gov.au/violet-town-police-station',
    'https://www.police.vic.gov.au/location/?q=wallan' => 'https://www.police.vic.gov.au/wallan-police-station',
    'https://www.police.vic.gov.au/location/?q=walwa' => 'https://www.police.vic.gov.au/walwa-police-station',
    'https://www.police.vic.gov.au/location/?q=wangaratta' => 'https://www.police.vic.gov.au/wangaratta-police-station',
    'https://www.police.vic.gov.au/location/?q=warburton' => 'https://www.police.vic.gov.au/warburton-police-station',
    'https://www.police.vic.gov.au/location/?q=warracknabeal' => 'https://www.police.vic.gov.au/warracknabeal-police-station',
    'https://www.police.vic.gov.au/location/?q=warragul' => 'https://www.police.vic.gov.au/warragul-police-station',
    'https://www.police.vic.gov.au/location/?q=warrandyte' => 'https://www.police.vic.gov.au/warrandyte-police-station',
    'https://www.police.vic.gov.au/location/?q=warrnambool' => 'https://www.police.vic.gov.au/warrnambool-police-station',
    'https://www.police.vic.gov.au/location/?q=grovedale' => 'https://www.police.vic.gov.au/waurn-ponds-police-station',
    'https://www.police.vic.gov.au/location/?q=wedderburn' => 'https://www.police.vic.gov.au/wedderburn-police-station',
    'https://www.police.vic.gov.au/location/?q=werribee' => 'https://www.police.vic.gov.au/werribee-police-station',
    'https://www.police.vic.gov.au/location/?q=werrimull' => 'https://www.police.vic.gov.au/werrimull-police-station',
    'https://www.police.vic.gov.au/location/?q=whitfield' => 'https://www.police.vic.gov.au/whitfield-police-station',
    'https://www.police.vic.gov.au/location/?q=whittlesea' => 'https://www.police.vic.gov.au/whittlesea-police-station',
    'https://www.police.vic.gov.au/location/?q=willaura' => 'https://www.police.vic.gov.au/willaura-police-station',
    'https://www.police.vic.gov.au/location/?q=williamstown' => 'https://www.police.vic.gov.au/williamstown-police-station',
    'https://www.police.vic.gov.au/location/?q=winchelsea' => 'https://www.police.vic.gov.au/winchelsea-police-station',
    'https://www.police.vic.gov.au/location/?q=wodonga' => 'https://www.police.vic.gov.au/wodonga-police-station',
    'https://www.police.vic.gov.au/location/?q=wonthaggi' => 'https://www.police.vic.gov.au/wonthaggi-police-station',
    'https://www.police.vic.gov.au/location/?q=woodend' => 'https://www.police.vic.gov.au/woodend-police-station',
    'https://www.police.vic.gov.au/location/?q=woods-point' => 'https://www.police.vic.gov.au/woods-point-police-station',
    'https://www.police.vic.gov.au/location/?q=woomelang' => 'https://www.police.vic.gov.au/woomelang-police-station',
    'https://www.police.vic.gov.au/location/?q=wycheproof' => 'https://www.police.vic.gov.au/wycheproof-police-station',
    'https://www.police.vic.gov.au/location/?q=wyndham-north' => 'https://www.police.vic.gov.au/wyndham-north-police-station',
    'https://www.police.vic.gov.au/location/?q=yackandandah' => 'https://www.police.vic.gov.au/yackandandah-police-station',
    'https://www.police.vic.gov.au/location/?q=yarra-glen' => 'https://www.police.vic.gov.au/yarra-glen-police-station',
    'https://www.police.vic.gov.au/location/?q=yarra-junction' => 'https://www.police.vic.gov.au/yarra-junction-police-station',
    'https://www.police.vic.gov.au/location/?q=yarram' => 'https://www.police.vic.gov.au/yarram-police-station',
    'https://www.police.vic.gov.au/location/?q=yarrawonga' => 'https://www.police.vic.gov.au/yarrawonga-police-station',
    'https://www.police.vic.gov.au/location/?q=yea' => 'https://www.police.vic.gov.au/yea-police-station',
  ];

  return $content_vicpol;
}

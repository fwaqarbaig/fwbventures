<?php

require __DIR__.'/area_builder_solar.php';
require __DIR__.'/area_builder_solar_frame.php';
require __DIR__.'/area_builder_cctv.php';
require __DIR__.'/area_builder_lithium.php';

$sContent = buildNewSolarAreaContent('solar-panel-installation-in-bahria-town-karachi', 'Solar Panel Installation in Bahria Town Karachi', [
    'area_name' => 'Bahria Town Karachi (Precincts 1 through 31, Sports City & Farmhouses)',
    'challenges' => 'High open-plain wind shear (up to 140 km/h), intense summer ambient temperatures (42°C+), and grid fluctuation on the Super Highway corridor.',
    'popular_sizing' => '10kW, 15kW, 20kW, and 30kW Luxury Villa Hybrid Systems',
    'preferred_structure' => 'Elevated Hot-Dip Galvanized Pergolas (8.5 ft clear height) preserving full terrace usage, engineered to Bahria Town architectural guidelines.',
    'bylaws' => 'Bahria Town Design & Town Planning Bylaws',
    'savings' => 'PKR 85,000 to PKR 250,000+ per month',
]);

$fContent = buildSolarFrameAreaContent('solar-structure-installation-in-bahria-town-karachi', 'Solar Structure Installation in Bahria Town Karachi', [
    'area_name' => 'Bahria Town Karachi (Precincts 1 to 31 & Farmhouses)',
    'challenges' => 'High open-plain wind gusts (up to 140 km/h), intense summer sun exposure, and strict society parapet regulations.',
    'preferred_structure' => 'Elevated Hot-Dip Galvanized Pergolas (8.5ft clear height) and L2/L3 stands',
    'bylaws' => 'Bahria Town Building Control & Architectural Guidelines',
    'popular_profiles' => 'Elevated Pergolas, Gazebo Frames, and Villa Roof Mounts',
]);

$cContent = buildCctvAreaContent('cctv-camera-installation-in-bahria-town-karachi', 'CCTV Camera Installation in Bahria Town Karachi', [
    'area_name' => 'Bahria Town Karachi (Precincts 1 to 31, Sports City, Golf City & Farmhouses)',
    'security_focus' => 'Villa perimeter intrusion prevention, front gate visitor tracking, high-speed road surveillance, and continuous night monitoring across expansive plots.',
    'recommended_cameras' => '4K ColorVu Turrets for entrances, 8MP AI AcuSense Bullets for boundary walls, and 25x Optical Zoom PTZ Speed Domes for open compounds.',
    'cabling_type' => 'Cat6 SFTP 100% pure copper shielded outdoor cabling routed in UV-stabilized rigid PVC conduits',
    'bylaws' => 'Bahria Town Security & Building Control bylaws',
    'popular_packages' => '4-Camera Villa, 8-Camera Luxury Bungalow, and 16-Camera Commercial Plaza NVR Systems',
]);

$lContent = buildLithiumAreaContent('lithium-battery-in-bahria-town-karachi', 'Lithium Battery in Bahria Town Karachi', [
    'area_name' => 'Bahria Town Karachi (Precincts 1 to 31, Midway Commercial & Farmhouses)',
    'power_profile' => 'High residential air-conditioning loads during peak summer heat, occasional grid feeder tripping on the M-9 Super Highway corridor, and desire for silent, zero-emission luxury power backup.',
    'recommended_batteries' => '5.12kWh and 10.24kWh Wall-Mounted LiFePO4 Powerwalls, paired with 8kW to 15kW Hybrid Inverters for multi-ton AC backup.',
    'savings' => 'Completely eliminates noisy diesel generator maintenance and fuel costs while delivering 12-15+ years of daily solar self-consumption',
    'bylaws' => 'Bahria Town electrical safety standards and environmental regulations',
]);

echo 'Solar Word count:   '.str_word_count(strip_tags($sContent))."\n";
echo 'Frame Word count:   '.str_word_count(strip_tags($fContent))."\n";
echo 'CCTV Word count:    '.str_word_count(strip_tags($cContent))."\n";
echo 'Lithium Word count: '.str_word_count(strip_tags($lContent))."\n";

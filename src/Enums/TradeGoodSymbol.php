<?php

namespace AlejandroAPorras\SpaceTraders\Enums;

enum TradeGoodSymbol: string
{
    case PRECIOUS_STONES = 'PRECIOUS_STONES';
    case QUARTZ_SAND = 'QUARTZ_SAND';
    case SILICON_CRYSTALS = 'SILICON_CRYSTALS';
    case AMMONIA_ICE = 'AMMONIA_ICE';
    case LIQUID_HYDROGEN = 'LIQUID_HYDROGEN';
    case LIQUID_NITROGEN = 'LIQUID_NITROGEN';
    case ICE_WATER = 'ICE_WATER';
    case EXOTIC_MATTER = 'EXOTIC_MATTER';
    case ADVANCED_CIRCUITRY = 'ADVANCED_CIRCUITRY';
    case GRAVITON_EMITTERS = 'GRAVITON_EMITTERS';
    case IRON = 'IRON';
    case IRON_ORE = 'IRON_ORE';
    case COPPER = 'COPPER';
    case COPPER_ORE = 'COPPER_ORE';
    case ALUMINUM = 'ALUMINUM';
    case ALUMINUM_ORE = 'ALUMINUM_ORE';
    case SILVER = 'SILVER';
    case SILVER_ORE = 'SILVER_ORE';
    case GOLD = 'GOLD';
    case GOLD_ORE = 'GOLD_ORE';
    case PLATINUM = 'PLATINUM';
    case PLATINUM_ORE = 'PLATINUM_ORE';
    case DIAMONDS = 'DIAMONDS';
    case URANITE = 'URANITE';
    case URANITE_ORE = 'URANITE_ORE';
    case MERITIUM = 'MERITIUM';
    case MERITIUM_ORE = 'MERITIUM_ORE';
    case HYDROCARBON = 'HYDROCARBON';
    case ANTIMATTER = 'ANTIMATTER';
    case FAB_MATS = 'FAB_MATS';
    case FERTILIZERS = 'FERTILIZERS';
    case FABRICS = 'FABRICS';
    case FOOD = 'FOOD';
    case JEWELRY = 'JEWELRY';
    case MACHINERY = 'MACHINERY';
    case FIREARMS = 'FIREARMS';
    case ASSAULT_RIFLES = 'ASSAULT_RIFLES';
    case MILITARY_EQUIPMENT = 'MILITARY_EQUIPMENT';
    case EXPLOSIVES = 'EXPLOSIVES';
    case LAB_INSTRUMENTS = 'LAB_INSTRUMENTS';
    case AMMUNITION = 'AMMUNITION';
    case ELECTRONICS = 'ELECTRONICS';
    case SHIP_PLATING = 'SHIP_PLATING';
    case SHIP_PARTS = 'SHIP_PARTS';
    case EQUIPMENT = 'EQUIPMENT';
    case FUEL = 'FUEL';
    case MEDICINE = 'MEDICINE';
    case DRUGS = 'DRUGS';
    case CLOTHING = 'CLOTHING';
    case MICROPROCESSORS = 'MICROPROCESSORS';
    case PLASTICS = 'PLASTICS';
    case POLYNUCLEOTIDES = 'POLYNUCLEOTIDES';
    case BIOCOMPOSITES = 'BIOCOMPOSITES';
    case QUANTUM_STABILIZERS = 'QUANTUM_STABILIZERS';
    case NANOBOTS = 'NANOBOTS';
    case AI_MAINFRAMES = 'AI_MAINFRAMES';
    case QUANTUM_DRIVES = 'QUANTUM_DRIVES';
    case ROBOTIC_DRONES = 'ROBOTIC_DRONES';
    case CYBER_IMPLANTS = 'CYBER_IMPLANTS';
    case GENE_THERAPEUTICS = 'GENE_THERAPEUTICS';
    case NEURAL_CHIPS = 'NEURAL_CHIPS';
    case MOOD_REGULATORS = 'MOOD_REGULATORS';
    case VIRAL_AGENTS = 'VIRAL_AGENTS';
    case MICRO_FUSION_GENERATORS = 'MICRO_FUSION_GENERATORS';
    case SUPERGRAINS = 'SUPERGRAINS';
    case LASER_RIFLES = 'LASER_RIFLES';
    case HOLOGRAPHICS = 'HOLOGRAPHICS';
    case SHIP_SALVAGE = 'SHIP_SALVAGE';
    case RELIC_TECH = 'RELIC_TECH';
    case NOVEL_LIFEFORMS = 'NOVEL_LIFEFORMS';
    case BOTANICAL_SPECIMENS = 'BOTANICAL_SPECIMENS';
    case CULTURAL_ARTIFACTS = 'CULTURAL_ARTIFACTS';
    case FRAME_PROBE = 'FRAME_PROBE';
    case FRAME_DRONE = 'FRAME_DRONE';
    case FRAME_INTERCEPTOR = 'FRAME_INTERCEPTOR';
    case FRAME_RACER = 'FRAME_RACER';
    case FRAME_FIGHTER = 'FRAME_FIGHTER';
    case FRAME_FRIGATE = 'FRAME_FRIGATE';
    case FRAME_SHUTTLE = 'FRAME_SHUTTLE';
    case FRAME_EXPLORER = 'FRAME_EXPLORER';
    case FRAME_MINER = 'FRAME_MINER';
    case FRAME_LIGHT_FREIGHTER = 'FRAME_LIGHT_FREIGHTER';
    case FRAME_HEAVY_FREIGHTER = 'FRAME_HEAVY_FREIGHTER';
    case FRAME_TRANSPORT = 'FRAME_TRANSPORT';
    case FRAME_DESTROYER = 'FRAME_DESTROYER';
    case FRAME_CRUISER = 'FRAME_CRUISER';
    case FRAME_CARRIER = 'FRAME_CARRIER';
    case REACTOR_SOLAR_I = 'REACTOR_SOLAR_I';
    case REACTOR_FUSION_I = 'REACTOR_FUSION_I';
    case REACTOR_FISSION_I = 'REACTOR_FISSION_I';
    case REACTOR_CHEMICAL_I = 'REACTOR_CHEMICAL_I';
    case REACTOR_ANTIMATTER_I = 'REACTOR_ANTIMATTER_I';
    case ENGINE_IMPULSE_DRIVE_I = 'ENGINE_IMPULSE_DRIVE_I';
    case ENGINE_ION_DRIVE_I = 'ENGINE_ION_DRIVE_I';
    case ENGINE_ION_DRIVE_II = 'ENGINE_ION_DRIVE_II';
    case ENGINE_HYPER_DRIVE_I = 'ENGINE_HYPER_DRIVE_I';
    case MODULE_MINERAL_PROCESSOR_I = 'MODULE_MINERAL_PROCESSOR_I';
    case MODULE_GAS_PROCESSOR_I = 'MODULE_GAS_PROCESSOR_I';
    case MODULE_CARGO_HOLD_I = 'MODULE_CARGO_HOLD_I';
    case MODULE_CARGO_HOLD_II = 'MODULE_CARGO_HOLD_II';
    case MODULE_CARGO_HOLD_III = 'MODULE_CARGO_HOLD_III';
    case MODULE_CREW_QUARTERS_I = 'MODULE_CREW_QUARTERS_I';
    case MODULE_ENVOY_QUARTERS_I = 'MODULE_ENVOY_QUARTERS_I';
    case MODULE_PASSENGER_CABIN_I = 'MODULE_PASSENGER_CABIN_I';
    case MODULE_MICRO_REFINERY_I = 'MODULE_MICRO_REFINERY_I';
    case MODULE_SCIENCE_LAB_I = 'MODULE_SCIENCE_LAB_I';
    case MODULE_JUMP_DRIVE_I = 'MODULE_JUMP_DRIVE_I';
    case MODULE_JUMP_DRIVE_II = 'MODULE_JUMP_DRIVE_II';
    case MODULE_JUMP_DRIVE_III = 'MODULE_JUMP_DRIVE_III';
    case MODULE_WARP_DRIVE_I = 'MODULE_WARP_DRIVE_I';
    case MODULE_WARP_DRIVE_II = 'MODULE_WARP_DRIVE_II';
    case MODULE_WARP_DRIVE_III = 'MODULE_WARP_DRIVE_III';
    case MODULE_SHIELD_GENERATOR_I = 'MODULE_SHIELD_GENERATOR_I';
    case MODULE_SHIELD_GENERATOR_II = 'MODULE_SHIELD_GENERATOR_II';
    case MODULE_ORE_REFINERY_I = 'MODULE_ORE_REFINERY_I';
    case MODULE_FUEL_REFINERY_I = 'MODULE_FUEL_REFINERY_I';
    case MOUNT_GAS_SIPHON_I = 'MOUNT_GAS_SIPHON_I';
    case MOUNT_GAS_SIPHON_II = 'MOUNT_GAS_SIPHON_II';
    case MOUNT_GAS_SIPHON_III = 'MOUNT_GAS_SIPHON_III';
    case MOUNT_SURVEYOR_I = 'MOUNT_SURVEYOR_I';
    case MOUNT_SURVEYOR_II = 'MOUNT_SURVEYOR_II';
    case MOUNT_SURVEYOR_III = 'MOUNT_SURVEYOR_III';
    case MOUNT_SENSOR_ARRAY_I = 'MOUNT_SENSOR_ARRAY_I';
    case MOUNT_SENSOR_ARRAY_II = 'MOUNT_SENSOR_ARRAY_II';
    case MOUNT_SENSOR_ARRAY_III = 'MOUNT_SENSOR_ARRAY_III';
    case MOUNT_MINING_LASER_I = 'MOUNT_MINING_LASER_I';
    case MOUNT_MINING_LASER_II = 'MOUNT_MINING_LASER_II';
    case MOUNT_MINING_LASER_III = 'MOUNT_MINING_LASER_III';
    case MOUNT_LASER_CANNON_I = 'MOUNT_LASER_CANNON_I';
    case MOUNT_MISSILE_LAUNCHER_I = 'MOUNT_MISSILE_LAUNCHER_I';
    case MOUNT_TURRET_I = 'MOUNT_TURRET_I';
    case SHIP_PROBE = 'SHIP_PROBE';
    case SHIP_MINING_DRONE = 'SHIP_MINING_DRONE';
    case SHIP_SIPHON_DRONE = 'SHIP_SIPHON_DRONE';
    case SHIP_INTERCEPTOR = 'SHIP_INTERCEPTOR';
    case SHIP_LIGHT_HAULER = 'SHIP_LIGHT_HAULER';
    case SHIP_COMMAND_FRIGATE = 'SHIP_COMMAND_FRIGATE';
    case SHIP_EXPLORER = 'SHIP_EXPLORER';
    case SHIP_HEAVY_FREIGHTER = 'SHIP_HEAVY_FREIGHTER';
    case SHIP_LIGHT_SHUTTLE = 'SHIP_LIGHT_SHUTTLE';
    case SHIP_ORE_HOUND = 'SHIP_ORE_HOUND';
    case SHIP_REFINING_FREIGHTER = 'SHIP_REFINING_FREIGHTER';
    case SHIP_SURVEYOR = 'SHIP_SURVEYOR';
}

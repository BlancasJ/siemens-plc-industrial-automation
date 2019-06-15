# Industrial Automation with SIEMENS S7-1200 PLCs

Multi-PLC industrial automation system controlling a conveyor belt, warehouse, and robotic arm. Includes a real-time web monitoring dashboard. Two versions: cloud-send (stable, sends data via Arduino) and cloud-receive (experimental, receives from cloud).

## Context
- **Date:** 2019
- **Institution:** Universidad Politecnica de Yucatan (UPY)
- **Course/Event:** PLCs (Professor Pepe)
- **Type:** University Project

## What It Does
Coordinates three SIEMENS S7-1200 PLCs to run an integrated production line: one PLC drives a conveyor belt, another manages a storage warehouse, and a third controls a robotic arm. An Arduino bridge sends PLC state data to a MySQL database. A web dashboard built with PHP, JavaScript, and AJAX displays the system status in real time. The experimental cloud-receive variant attempts bidirectional cloud communication.

## Tech Stack
- SIEMENS TIA Portal V15.1
- 3x SIEMENS S7-1200 PLCs
- PHP, JavaScript, AJAX
- MySQL
- HTML/CSS

## How to Run
Requires SIEMENS TIA Portal V15.1 to open `.ap15_1` project files. The web dashboard requires a PHP/MySQL server (e.g., XAMPP or LAMP stack).

## Files
- `cloud-send/` -- Stable version (v1), Arduino sends PLC data to cloud
- `cloud-receive/` -- Experimental version (v2), receives commands from cloud
- `web-dashboard/` -- PLCMonitorProcess web application (PHP/JS/MySQL)

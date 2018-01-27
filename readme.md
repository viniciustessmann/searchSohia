# Where is Sofia?

Sofia is the name of your cat, and you need to find her as soon as possible in your house.
You will receive a file where each line represents your "home" and your rooms. The data will be structured in the following format:

{NAME1},{CHANCE1},{TIME1};{NAME2},{CHANCE2},{TIME2};{NAMEn},{CHANCEn},{TIMEn};{NAME99},{CHANCE99},{TIME99}

# File: Remessa.txt
	- Room, 15.5, Kitchen, 20.8, Room, 30.10, Bathroom, 6.2, Attic, 12,20, Garden, 17,18
	- Suite, 20.12, Bathroom, 8.8, Garden, 8.20, Basement, 15,18, Room, 15,8, Room, 34,23
	- Room, 51.15; Kitchen, 49.12
	- Room, 34.10, Room, 32.12, Kitchen, 33.8

# Where:
	- {NAMEn}   = Name of the room or part of the house
	- {CHANCEn} = Chances of finding the cat in the room in%
	- {TIMEn}  = Time spent searching for the cat, in seconds

# Exercise:
For each line (situation), you must enter the most efficient sequence to find Sofia in a "return.txt" file, which
formatted as the example:

# File: return.txt
	- Bedroom, Kitchen, Living Room, Bathroom, Attic, Garden
	- Kitchen, Living Room, Bedroom
	- Bathroom, Bedroom, Living Room, Garden, Suite
	- Kitchen, Bedroom
## Josequal Task:
Upload and Display KML File on Google Map

## Description:
Your task is to build a feature in a Laravel application that allows users to upload a KML file and display 
its contents on a Google Map.

# Requirement:
## User Authentication:
- Implement user authentication using Laravel's built-in authentication system, so users can log in to the 
application.
## Upload KML File:
- Create a page with a form that allows authenticated users to upload a KML file. Use Laravel's file 
uploading capabilities to handle the file upload.
## Display Google Map:
- Create another page that displays a Google Map using the Google Maps JavaScript API. The map should 
be centered at a default location and have an appropriate zoom level.
## Visualize KML Data on Map:
- When a user uploads a valid KML file, read its contents and extract the geographic data (points, lines, 
polygons, etc.). Use the Google Maps JavaScript API to display this data on the map.

# Guidelines:
- Focus on the basic functionality of uploading and displaying the KML file. No need to handle multiple 
- files or complex error handling in this version.
- Use SimpleXML or XMLReader to validate and read the KML file's contents. Ensure the uploaded file is a 
valid KML format.
- You can store the uploaded file in a temporary directory for this simplified version


# Bonus (Optional):
- Add basic error handling to display a message if the file upload fails or if there are issues with the KML 
file.
- Allow users to delete the uploaded file and remove its data from the map

# File Example:
[KML File](public/dwsample1-kml.kml)

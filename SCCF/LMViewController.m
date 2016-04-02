//
//  LMViewController.m
//  LMGeocoder
//
//  Created by LMinh on 01/06/2014.
//  Copyright (c) Năm 2014 LMinh. All rights reserved.
//

#import "LMViewController.h"
#import <CoreLocation/CoreLocation.h>
#import <AVFoundation/AVFoundation.h>
#import "LMAddress.h"
#import "LMGeocoder.h"
#import "VariableStore.h"
#import "Summary.h"
NSString *mMYGlobalVariable;
NSString *YGlobalVariable;
CLLocationManager *manager;
CLGeocoder *geocoder;
CLPlacemark *placemark;

@interface LMViewController () <CLLocationManagerDelegate>

@property (strong, nonatomic) CLLocationManager *locationManager;

@property (strong, nonatomic) IBOutlet UIImageView *backgroundImageView;
@property (strong, nonatomic) IBOutlet UILabel *latitudeLabel;
@property (strong, nonatomic) IBOutlet UILabel *longitudeLabel;
@property (strong, nonatomic) IBOutlet UIButton *getLocation;
@property (weak, nonatomic) IBOutlet MKMapView *mapview;
@property (weak, nonatomic) IBOutlet UIButton *contin;
@property (strong, nonatomic) IBOutlet UILabel *long2;
@property (strong, nonatomic) IBOutlet UILabel *lat2;




@end

@implementation LMViewController

#pragma mark - VIEW LIFECYCLE

- (void)viewDidLoad
{
    [self.manualAdd addTarget:self action:@selector(textFieldDidChange:) forControlEvents:UIControlEventEditingChanged];
    [super viewDidLoad];
    [[VariableStore sharedInstance] setLattitude: @"0"];
    [[VariableStore sharedInstance] setLongitude: @"0"];
    [[VariableStore sharedInstance] setAddress: @" "];
    
    self.manualAdd.delegate = self;

}
- (void)textFieldDidChange:(UITextField *)textField {
    if(textField == self.manualAdd)
        self.searchButton.hidden = ([self.manualAdd.text length] > 0) ? NO : YES;
if(textField == self.manualAdd)
self.getLocation.hidden = ([self.manualAdd.text length] > 0) ? YES : NO;
if(textField == self.manualAdd)
self.contin.enabled = ([self.manualAdd.text length] > 0) ? YES : NO; }

#pragma mark - LOCATION MANAGER

- (void)locationManager:(CLLocationManager *)manager didUpdateLocations:(NSArray *)locations
{
    
    //[self updateLongLat];
    CLLocation *location = [locations lastObject];
    CLLocationCoordinate2D coordinate = location.coordinate;
    
    self.latitudeLabel.text = [NSString stringWithFormat:@"%f", coordinate.latitude];
    self.longitudeLabel.text = [NSString stringWithFormat:@"%f", coordinate.longitude];
    
    [manager stopUpdatingLocation];
    
    
    
    [[VariableStore sharedInstance] setLattitude : _latitudeLabel.text];
    [[VariableStore sharedInstance] setLongitude : _longitudeLabel.text];
    [[LMGeocoder sharedInstance] reverseGeocodeCoordinate:coordinate
                                                  service:kLMGeocoderGoogleService
                                        completionHandler:^(LMAddress *address, NSError *error) {
                                            
                                            if (address && !error) {
                                                self.manualAdd.text = address.formattedAddress;
                                            }
                                            else {
                                                self.manualAdd.text = [error localizedDescription];
                                            }
                                            
                                            [self.manualAdd sizeToFit];
                                        }];
    
    
}
- (BOOL)textFieldShouldReturn:(UITextField *)textField {
    [textField resignFirstResponder];
    return NO;
}

- (void)locationManager:(CLLocationManager *)manager didFailWithError:(NSError *)error
{
    NSLog(@"Updating location failed");
}

- (IBAction)getLocation:(id)sender {

    
    manager.delegate = self;
    manager.desiredAccuracy = kCLLocationAccuracyBest;
    
    [manager startUpdatingLocation];
    
    //zooms into location
    self.mapview.showsUserLocation=YES;
    self.mapview.delegate = self;
    [self.mapview setUserTrackingMode:MKUserTrackingModeFollow animated:YES];
    
    
    // Start getting current location
    _mapview.showsUserLocation = YES;
    
    _contin.enabled = YES;
    
    self.locationManager = [[CLLocationManager alloc] init];
    self.locationManager.delegate = self;
    self.locationManager.desiredAccuracy = kCLLocationAccuracyBestForNavigation;
    if ([self.locationManager respondsToSelector:@selector(requestAlwaysAuthorization)]) {
        [self.locationManager requestAlwaysAuthorization];
    }
    [self.locationManager startUpdatingLocation];
    
  self.backgroundImageView.image = [UIImage imageNamed:@"background"];
    
    [self updateLongLat];
    
    
    
}


- (IBAction)searchy:(id)sender {
    
    
    [self updateLongLat];
    
    [_manualAdd resignFirstResponder];
    CLGeocoder *geocoder = [[CLGeocoder alloc] init];
    [geocoder geocodeAddressString:_manualAdd.text completionHandler:^(NSArray *placemarks, NSError *error) {
        //Error checking
        
        CLPlacemark *placemark = [placemarks objectAtIndex:0];
        MKCoordinateRegion region;
        region.center.latitude = placemark.region.center.latitude;
        region.center.longitude = placemark.region.center.longitude;
        MKCoordinateSpan span;
        double radius = placemark.region.radius / 1000; // convert to km
        
        NSLog(@"[searchBarSearchButtonClicked] Radius is %f", radius);
        
        
        span.latitudeDelta = radius / 112.0;
        
        region.span = span;
        
        [_mapview setRegion:region animated:YES];
    }];
    
}


- (IBAction)continuu:(id)sender {
    
    [self updateLongLat];
    
    
    if(_manualAdd.text != nil){
        [[VariableStore sharedInstance] setAddress : _manualAdd.text];
    }
    
    Summary *secondViewController =
    [self.storyboard instantiateViewControllerWithIdentifier:@"nextOne1"];
    [self presentViewController:secondViewController animated:YES completion:nil];

}

-(void)updateLongLat{
    
    _lat2.text = _latitudeLabel.text;
    _long2.text = _longitudeLabel.text;

}



///// OLD  CODE

/*-(IBAction)GetLocation:(id)sender {
    
    
    mapview.showsUserLocation = YES;
}


- (void)didReceiveMemoryWarning
{
    [super didReceiveMemoryWarning];
    // Dispose of any resources that can be recreated.
}

- (IBAction)buttonPressed:(id)sender {
    
    manager.delegate = self;
    manager.desiredAccuracy = kCLLocationAccuracyBest;
    
    [manager startUpdatingLocation];
    
    
}

#pragma mark - CLLocationManagerDelegate Methods

- (void)locationManager:(CLLocationManager *)manager didFailWithError:(NSError *)error
{
    
    NSLog(@"Error: %@", error);
    NSLog(@"Failed to get location! :(");
    
}

- (void)locationManager:(CLLocationManager *)manager didUpdateToLocation:(CLLocation *)newLocation fromLocation:(CLLocation *)oldLocation
{
    
    NSLog(@"Location: %@", newLocation);
    CLLocation *currentLocation = newLocation;
    
    [geocoder reverseGeocodeLocation:currentLocation completionHandler:^(NSArray *placemarks, NSError *error) {
        
        if (error == nil && [placemarks count] > 0) {
            
            placemark = [placemarks lastObject];
            
        } else {
            
            NSLog(@"%@", error.debugDescription);
            
        }
        if (currentLocation != nil) {
            NSString *Longitude = [NSString stringWithFormat:@"%.8f", currentLocation.coordinate.longitude];
            NSString *Lattitude = [NSString stringWithFormat:@"%.8f", currentLocation.coordinate.latitude];
            [[VariableStore sharedInstance] setLattitude : Lattitude];
            [[VariableStore sharedInstance] setLongitude : Longitude];
        }
        [manager stopUpdatingLocation];
        MKCoordinateRegion region = { {0.0, 0.0}, {0.0,0.0}};
        region.center.latitude = [[[VariableStore sharedInstance] getLattitude] doubleValue];
        region.center.longitude = [[[VariableStore sharedInstance] getLongitude] doubleValue];
        region.span.longitudeDelta = 0.01f;
        region.span.latitudeDelta = 0.01f;
        [_mapview setRegion:region animated:YES];
    } ];
    
    
    
}
*/



@end

//
//  MyLocationViewController.m
//  SCCF
//
//  Created by Kenneth Coury on 2/21/15.
//  Copyright (c) 2015 Kenneth Coury. All rights reserved.
//


#import "MyLocationViewController.h"
#import <CoreLocation/CoreLocation.h>
#import "Summary.h"



@implementation MyLocationViewController {
    
    CLLocationManager *manager;
    CLGeocoder *geocoder;
    CLPlacemark *placemark;
    
    
}



-(IBAction)reveal1 {
    button1.hidden = NO;
    button1.enabled = YES;
    enterAddress.enabled = NO;
}



@synthesize mapview;

- (void)viewDidLoad
{
    [super viewDidLoad];


    // Do any additional setup after loading the view, typically from a nib.
    
   }

-(IBAction)GetLocation:(id)sender {
    

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
        [mapview setRegion:region animated:YES];
    } ];
    

    
}

-(BOOL)textField:(UITextField *)textField shouldChangeCharactersInRange:(NSRange)range replacementString:(NSString *)string {
    NSUInteger length = enterAddress.text.length - range.length + string.length;
    if (length > 0) {
        button1.enabled = YES;
    } else {
        button1.enabled = NO;
    }
    return YES;
}

- (BOOL)textFieldShouldReturn:(UITextField *)textField {
    [textField resignFirstResponder];
    return NO;
}






@end


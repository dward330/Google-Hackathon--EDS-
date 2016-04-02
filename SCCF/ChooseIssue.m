//
//  ChooseIssue.m
//  SCCF
//
//  Created by Kenneth Coury on 2/21/15.
//  Copyright (c) 2015 Kenneth Coury. All rights reserved.
//

#import "ChooseIssue.h"

@interface ChooseIssue ()

@end

@implementation ChooseIssue
@synthesize LocationImage;
@synthesize LocationPicker;
@synthesize Location = _Location;

- (void)viewDidLoad; {
    [super viewDidLoad];
    // Do any additional setup after loading the view from its nib.
    
    _Location = [[NSArray alloc] initWithObjects:
                @"-Select an Issue-",
                @"Sewage",
                @"Erosion",
                @"Illegal Dumping",
                @"Clogged Inlets",
                @"Runoff Prone Area",
                @"Discolored Water",
                @"Foul Odors",
                @"Clogged Culvert",
                @"Other",
        nil];
    
    _conti.enabled = NO;
}

- (void)didReceiveMemoryWarning {
    [super didReceiveMemoryWarning];
    // Dispose of any resources that can be recreated.
}

#pragma mark - UIPickerView Methods

- (NSInteger)numberOfComponentsInPickerView:(UIPickerView *)pickerView
{
    return 1;
    
}

- (NSInteger)pickerView:(UIPickerView *)pickerView
numberOfRowsInComponent:(NSInteger)component
{
    return _Location.count;
}

- (NSString *)pickerView:(UIPickerView *)pickerView
             titleForRow:(NSInteger)row
            forComponent:(NSInteger)component
{
    
    return [_Location objectAtIndex:row];
}

- (void)pickerView:(UIPickerView *)pickerView
      didSelectRow:(NSInteger)row
       inComponent:(NSInteger)component




{
    UIImage * ChImage = [UIImage imageNamed:@"-.png"];
    UIImage * Sewimage = [UIImage imageNamed:@"Sewage.png"];
    UIImage * Erimage = [UIImage imageNamed:@"Erosion.png"];
    UIImage * Illimage = [UIImage imageNamed:@"Illegal Dumping.png"];
    UIImage * Cloimage = [UIImage imageNamed:@"Clogged Inlets.png"];
    UIImage * RPAimage = [UIImage imageNamed:@"Runoff Prone Area.png"];
    UIImage * Diswimage = [UIImage imageNamed:@"Discolored Water.png"];
    UIImage * FOimage = [UIImage imageNamed:@"Foul Odors.png"];
    UIImage * CCimage = [UIImage imageNamed:@"Clogged Culvert.png"];
    UIImage * OTimage = [UIImage imageNamed:@"Other.png"];
  

    
    switch (row) {
        
        case 0:             LocationImage.image = ChImage;
            [[VariableStore sharedInstance] setHazard: @"Other Hazard"];
            _conti.enabled = NO;
            
            
            break;
        case 1:             LocationImage.image = Sewimage;
            [[VariableStore sharedInstance] setHazard:_Location[1]];
            _conti.enabled = YES;
            break;
        case 2:             LocationImage.image = Erimage;
            [[VariableStore sharedInstance] setHazard:_Location[2]];
            _conti.enabled = YES;
            break;
        case 3:             LocationImage.image = Illimage;
            [[VariableStore sharedInstance] setHazard:_Location[3]];
            _conti.enabled = YES;
            break;
        case 4:             LocationImage.image = Cloimage;
            [[VariableStore sharedInstance] setHazard:_Location[4]];
            _conti.enabled = YES;
            break;
        case 5:             LocationImage.image = RPAimage;
            [[VariableStore sharedInstance] setHazard:_Location[5]];
            _conti.enabled = YES;
            break;
        case 6:             LocationImage.image = Diswimage;
            [[VariableStore sharedInstance] setHazard:_Location[6]];
            _conti.enabled = YES;
            break;
        case 7:             LocationImage.image = FOimage;
            [[VariableStore sharedInstance] setHazard:_Location[7]];
            _conti.enabled = YES;
            break;
        case 8:             LocationImage.image = CCimage;
            [[VariableStore sharedInstance] setHazard:_Location[8]];
            _conti.enabled = YES;
            break;
        case 9:             LocationImage.image = OTimage;
            [[VariableStore sharedInstance] setHazard:_Location[9]];
            _conti.enabled = YES;
            break;
       
    }
    
    
    
}

@end

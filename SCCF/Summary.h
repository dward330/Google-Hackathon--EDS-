//
//  Summary.h
//  SCCF
//
//  Created by Kenneth Coury on 2/22/15.
//  Copyright (c) 2015 Kenneth Coury. All rights reserved.
//

#import <UIKit/UIKit.h>
#import "MyLocationViewController.h"
#import "UserInfo.h"
#import "MyLocationViewController.h"
#import "LMViewController.h"

@interface Summary : UIViewController{
  
    IBOutlet UIImageView *submitting;
 
    IBOutlet UIActivityIndicatorView *activityind;

    IBOutlet UIButton *back;
    IBOutlet UIButton *senditt;
    
    IBOutlet UIImageView *imageView;
    
    IBOutlet UILabel *firstName;
    IBOutlet UILabel *lastName;
    IBOutlet UILabel *emailA;
    IBOutlet UILabel *pNumber;
    IBOutlet UILabel *zipCode;
    IBOutlet UILabel *looVal;
    IBOutlet UILabel *laaVal;
    IBOutlet UILabel *hazard;
    IBOutlet UILabel *descript;
    IBOutlet UILabel *adressy;
    
    
    IBOutlet UIScrollView *scrollyV;

}

@property (nonatomic, retain) IBOutlet MKMapView *mapview;
@property (retain, nonatomic) NSMutableData *receivedData;


@property (nonatomic, retain)NSString *passedValue;
- (IBAction)sendData:(UIButton *)sender;

-(IBAction)back:(id)sender;

@end


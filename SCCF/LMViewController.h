//
//  LMViewController.h
//  LMGeocoder
//
//  Created by LMinh on 01/06/2014.
//  Copyright (c) Năm 2014 LMinh. All rights reserved.
//

#import <UIKit/UIKit.h>
#import <MapKit/MapKit.h>

@interface LMViewController : UIViewController<UITextViewDelegate>

@property (strong, nonatomic) IBOutlet UIButton *searchButton;
@property (strong, nonatomic) IBOutlet UILabel *addressLabel;


@property (strong, nonatomic) IBOutlet UITextField *manualAdd;

@end

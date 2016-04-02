//
//  Descript.m
//  SCCF
//
//  Created by Kenneth Coury on 3/5/15.
//  Copyright (c) 2015 Kenneth Coury. All rights reserved.
//

#import "Descript.h"

@interface Descript ()

@end

@implementation Descript

-(IBAction)ReturnKeyButton:(id)sender {
    [sender resignFirstResponder];
}
- (void)viewDidLoad {
    
    [super viewDidLoad];
    // Do any additional setup after loading the view.
}

- (void)didReceiveMemoryWarning {
    [super didReceiveMemoryWarning];
    // Dispose of any resources that can be recreated.
}

- (IBAction)contButton:(id)sender {
    
    [[VariableStore sharedInstance] setDescription :_frame.text];
    
    
    Summary *secondViewController =
    [self.storyboard instantiateViewControllerWithIdentifier:@"location"];
    [self presentViewController:secondViewController animated:YES completion:nil];
}

-(void) touchesBegan:(NSSet *)touches withEvent:(UIEvent *)event{
    
    [self.view endEditing:YES];
    
}

@end
